<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //index
    public function index(){
        $data = Order::with('user')->get();
        return view('admin.order.index')->with(['data'=>$data]);
    }

    //filter order
    public function filterOrder($status){
        $data = Order::where('status',$status)->get();
        return view('admin.order.index')->with(['data'=>$data]);
    }

    //order detail page
    public function showOrder($id){
        $order = Order::where('order_id',$id)->with(['stateDivision','city','township','user'])->first();
        $orderItems = OrderItem::where('order_id',$id)->with(['product','color','size'])->get();
        return view('admin.order.detail')->with(['order'=>$order,'orderItems'=>$orderItems]);
    }

    //change order status
    public function confirmOrder($id){
        $this->changeOrderStatus($id,'confirmed');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }

    public function processOrder($id){
        $this->changeOrderStatus($id,'processing');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }

    public function pickOrder($id){
        $this->changeOrderStatus($id,'picked');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }
    public function shipOrder($id){
        $this->changeOrderStatus($id,'shipped');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }
    public function deliverOrder($id){
        $this->changeOrderStatus($id,'delivered');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }
    public function completeOrder($id){
        $this->changeOrderStatus($id,'complete');
        return back()->with(['success'=>'Order Status Updated Successfully']);
    }

    private function changeOrderStatus($id,$status){
        Order::where('order_id',$id)->update(['status'=>$status]);
    }
}