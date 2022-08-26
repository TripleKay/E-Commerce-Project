<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserOrderNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    //track order by invoice
    public function trackOrder(Request $request){

        $validation = Validator::make($request->all(),[
            'invoiceNumber'=> 'required',
        ]);
        if($validation->fails()){
            return back()->with(['error'=>'Invoice code must be requird']);
        }

        $order = Order::select('*')->where('invoice_number',$request->invoiceNumber)->withCount('orderItem')->first();
        if($order){
            return view('frontEnd.orderTracking')->with(['order'=>$order]);
        }else{
            return back()->with(['error'=>'Your invoice code is Invalid']);
        }
    }

    //create
    public function createOrder(Request $request){
        //empty cart checking
        if(Session::has('cart')){
            if(count(Session::get('cart')) == 0){
                return back()->with(['error'=>'Your cart is empty!']);
            }
        }else{
            return back()->with(['error'=>'Your cart is empty!']);
        }
        //validation
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'stateDivisionId' => 'required',
            'cityId' => 'required',
            'townshipId' => 'required',
            'address' => 'required',
            'paymentMethod' => 'required',
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $data = [
          'user_id' => auth()->user()->id,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'state_division_id' => $request->stateDivisionId,
          'city_id' => $request->cityId,
          'township_id' => $request->townshipId,
          'address' => $request->address,
          'note' => $request->note,
          'payment_method' => $request->paymentMethod,
          'sub_total' => Session::get('subTotal'),
          'invoice_number' => 'EOS'.'-'.mt_rand(10000000,99999999),
          'order_date' => Carbon::now()->format('d F Y'),
           'order_month' => Carbon::now()->format('F'),
           'order_year' => Carbon::now()->format('Y'),
           'status' => 'pending',
           'created_at' => Carbon::now(),
        ];
        if(Session::has('coupon')){
            $coupon = Session::get('coupon');
            $data['coupon_id'] = $coupon['couponId'];
            $data['coupon_discount'] = $coupon['discountAmount'];
            $data['grand_total'] = $coupon['grandTotal'];
        }else{
            $data['grand_total'] = Session::get('subTotal');
        }

        $orderId = Order::insertGetId($data);

        $carts = Session::get('cart');
        foreach($carts as $key => $cart){
            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $cart['product_id'],
                'product_variant_id' => $key,
                'color_id' => $cart['colorId'] ,
                'size_id' => $cart['sizeId'] ,
                'unit_price' => $cart['price'],
                'quantity'=> $cart['quantity'],
                'total_price' => $cart['price'] * $cart['quantity'],
            ]);
        }

        Session::forget('cart');
        Session::forget('coupon');
        Session::forget('subTotal');

        $this->notifyToAdmin($orderId,'placed a new order');

        return redirect()->route('user#myOrder')->with(['success'=>'Order successfully']);


    }

    private function notifyToAdmin($orderId,$message){
        //notification
        $data = Order::where('order_id',$orderId)->with('user')->first();
        $data->message = $message;

        //notify to all admin
        $admin = User::where('role','admin')->get();
        Notification::send($admin, new UserOrderNotification($data));
    }
}