<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
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

        return redirect()->route('frontend#index')->with(['success'=>'Order successfully']);


    }
}