<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\ProductVariant;

class OrderController extends Controller
{
    //index
    public function index(){
        $data = Order::with('user')->get();
        return view('admin.order.index')->with(['data'=>$data]);
    }

    //ordrer filter
    public function filterOrder(Request $request){
        $data = Order::with('user')->where('status','like','%'.$request->orderStatus.'%')->get();
        return view('admin.order.index')->with(['data'=>$data]);
    }

    //pending order
    public function pendingOrder(){
        $data = Order::where('status','pending')->get();
        return view('admin.order.pendingOrder')->with(['data'=>$data]);
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
        //update product stock
        $orderItems = OrderItem::where('order_id',$id)->get();
        foreach($orderItems as $orderItem){
            $productVariant = ProductVariant::where('product_variant_id',$orderItem->product_variant_id)->first();
            $stock = [
                'available_stock' => $productVariant->available_stock - $orderItem->quantity,
            ];
            $productVariant = ProductVariant::where('product_variant_id',$orderItem->product_variant_id)->update($stock);
        }
        //update order status
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