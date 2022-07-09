<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index
    public function index(){
        return view('frontEnd.profile.index');
    }

    //order lists
    public function myOrder(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('frontEnd.profile.myOrder')->with(['orders'=>$orders]);
    }

    //order detail
    public function orderDetail($id){
        $order = Order::where('order_id',$id)->with(['stateDivision','city','township'])->first();
        $orderItems = OrderItem::where('order_id',$id)->with(['product','color','size'])->get();
        return view('frontEnd.profile.orderDetail')->with(['order'=>$order,'orderItems'=>$orderItems]);
    }
}
