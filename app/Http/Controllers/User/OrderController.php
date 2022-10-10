<?php

namespace App\Http\Controllers\User;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentInfo;
use Illuminate\Http\Request;
use App\Models\CashOnDelivery;
use App\Models\PaymentTransition;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Notifications\UserOrderNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\User\CreateOrderRequest;
use App\Http\Requests\User\ConfirmPaymentRequest;
use App\Http\Requests\User\TrackOrderRequest;

class OrderController extends Controller
{
    private $orderId;

    //track order by invoice
    public function trackOrder(TrackOrderRequest $request){
        $order = Order::where('invoice_number',$request->invoiceNumber)->exists();
        if(!$order){
            return back()->with(['error'=>'Your invoice code is Invalid']);
        }
        return view('frontEnd.orderTracking')->with(['order'=>$order]);
    }

    //create
    public function createOrder(CreateOrderRequest $request){
        //empty cart checking
        if((Session::has('cart') && count(Session::get('cart')) == 0) || !Session::has('cart')){
            return back()->with(['error'=>'Your cart is empty!']);
        }

        //cash on delivery
        if($request->paymentMethod == 'cos'){

            $checkCos = CashOnDelivery::where('status','1')->where('township_id',$request->townshipId)->exists();
            if(!$checkCos){
                return back()->with(['error'=>'Cash on Delivery is currently not available for your location.Please choose another one!']);
            }

            //insert data to order table and order items table
            DB::beginTransaction();

            try {
                //insert data to order table
                $order = Order::create($this->getOrderData($request));
                $this->orderId = $order->orderId;
                //insert data to order items table
                OrderItem::insert($this->getOrderItemsData());

                DB::commit();

                // all good
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with(['error'=> $e->getMessage()]);
            }

            //all session destroy
            $this->destroySessionData();

            //new order notify to admin
            $this->notifyToAdmin('placed a new order');

            return redirect()->route('user#myOrder')->with(['orderSuccess'=>'Order successfully']);

        }
        //cash
        $checkPaymentMethod = PaymentInfo::where('status','1')->where('type',$request->paymentMethod)->exists();
        if(!$checkPaymentMethod){
            return back()->with(['error'=>'This payment method is currently not available.Please choose another one!']);
        }

        $data = $request->all();

        return view('frontEnd.payment')->with(['data'=>$data]);
    }


    //confirm payment
    public function confirmPayment(ConfirmPaymentRequest $request){

        DB::beginTransaction();

        try {
             //insert data to order table
            $order = Order::create($this->getOrderData($request));
            $this->orderId = $order->id;
            //insert data to order items table
            OrderItem::insert($this->getOrderItemsData());

            //insert data to payment_transitions
            PaymentTransition::create($this->getPaymentTransitionData($request,$order->id));

            DB::commit();

            // all good
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }

        //all session destroy
        $this->destroySessionData();

        //new order notify to admin
        $this->notifyToAdmin($order->id,'placed a new order');

        return redirect()->route('user#myOrder')->with(['orderSuccess'=>'Order successfully']);
    }

    //destory session data
    private function destroySessionData(){
        Session::forget('cart');
        Session::forget('coupon');
        Session::forget('subTotal');
    }

    //get data to order table
    private function getOrderData($request){

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
            'invoice_number' => 'MYSHOP'.'-'.mt_rand(10000000,99999999),
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

          return $data;
    }

    //get data to order items
    private function getOrderItemsData(){

          $carts = Session::get('cart');
          foreach($carts as $key => $cart){
                $orderItem = [
                    'order_id' => $this->orderId,
                    'product_id' => $cart['product_id'],
                    'product_variant_id' => $key,
                    'color_id' => $cart['colorId'] ,
                    'size_id' => $cart['sizeId'] ,
                    'unit_price' => $cart['price'],
                    'quantity'=> $cart['quantity'],
                    'total_price' => $cart['price'] * $cart['quantity'],
                ];
                $orderItems[] = $orderItem;
          }
          return $orderItems;
    }

    //get payment data
    private function getPaymentTransitionData($request,$orderId){
        $paymentData = [
            'order_id' => $orderId,
            'payment_info_id' => $request->paymentInfoId,
            'created_at' => Carbon::now(),
        ];
        $ssFile = $request->file('paymentScreenshot');
        $ssFileName = uniqid().'-'.$ssFile->getClientOriginalName();
        $ssFile->move(public_path().'/uploads/payment/',$ssFileName);
        $paymentData['payment_screenshot'] = $ssFileName;

        return $paymentData;
    }

    //order notify to admin
    private function notifyToAdmin($message){
        //notification
        $data = Order::where('order_id',$this->orderId)->with('user')->first();
        $data->message = $message;

        //notify to all admin
        $admin = User::where('role','admin')->get();
        Notification::send($admin, new UserOrderNotification($data));

   }
}