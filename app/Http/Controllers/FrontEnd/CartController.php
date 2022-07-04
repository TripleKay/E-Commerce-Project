<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //view all carts page
    public function viewCarts(){
        return view('frontEnd.cart');
    }

    //add to cart
    public function addToCart(Request $request){
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        //request data
        $productId = $request->productId;
        $colorId = $request->colorId;
        $sizeId = $request->sizeId;
        $quantity = $request->qty;

        $variant = ProductVariant::where('product_id',$productId)->where('color_id',$colorId)->where('size_id',$sizeId)->first();
        $product = Product::where('product_id',$productId)->first();

        $cart = session()->get('cart',[]);

        //check stock and qty
        if($variant->available_stock >= $quantity && $quantity <= 10 && $quantity > 0 ){
            //check alerady cart
            if(isset($cart[$variant->product_variant_id])){
                return response()->json([
                    'error' => 'Already added to cart',
                ]);
            }else{
                $data = $this->requestCartData($request,$product);
                $cart[$variant->product_variant_id] = $data;
                Session::put('cart',$cart);
            }
        }else{
            return response()->json([
                'error' => 'quantity must be min: 1 or max: 10'
            ]);
        }

        // cart total price and total carts
        $count = count(Session::get('cart'));
        $totalPrice = $this->cartTotalPrice();

        return response()->json([
            'success'=> 'add to cart successfully',
            'count' => $count,
            'totalPrice' => $totalPrice,
        ]);
    }

    //delete cart
    public function deleteCart($id){
        $cart = Session::get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
            Session::put('cart',$cart);
        }
        $this->cartTotalPrice();
        if (Session::has('coupon')) {
            $couponCode = Session::get('coupon')['couponCode'];
            $coupon = Coupon::where('coupon_code',$couponCode)->first();
            $couponData = $this->requestCouponData($coupon);
            Session::put('coupon',$couponData);
        }
        return back()->with(['success'=>'deleted successfully']);

    }

    //update cart
    public function updateCart(Request $request){
        $variant = ProductVariant::where('product_variant_id',$request->id)->first();
        if($variant->available_stock >= $request->quantity && $request->quantity <= 10 && $request->quantity > 0 ){
            $cart = Session::get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            Session::put('cart',$cart);
        }
        $this->cartTotalPrice();

        if (Session::has('coupon')) {
            $couponCode = Session::get('coupon')['couponCode'];
            $coupon = Coupon::where('coupon_code',$couponCode)->first();
            $couponData = $this->requestCouponData($coupon);
            Session::put('coupon',$couponData);
        }

        return response()->json([
            'success'=>'updated successfully'
        ]);
    }

    //cart total price
    private function cartTotalPrice(){
        $totalPrice = 0;
        foreach(Session::get('cart') as $item){
            $totalPrice += $item['price'] * $item['quantity'];
        }
        Session::put('subTotal',$totalPrice);
        return $totalPrice;
    }

    //get request cart data
    private function requestCartData($request,$product){
        $data = [
            // 'product_id' => $request->productId,
            'productName' => $product->name,
            'productImage' => $product->preview_image,
            'quantity' => $request->qty,
            'color' => null,
            'size' => null,
            'price' => $request->price,
        ];
        if(!empty($request->colorId)){
            $data['color'] = $request->colorName;
        }
        if(!empty($request->sizeId)){
            $data['size'] = $request->sizeName;
        }
        return $data;
    }

    //apply coupon
    public function applyCoupon(Request $request){
        $coupon = Coupon::where('coupon_code',$request->couponCode)->first();
        if(!empty($coupon)){
            if($coupon->start_date <= Carbon::now() && $coupon->end_date >= Carbon::now()){
                $data = $this->requestCouponData($coupon);
                Session::put('coupon',$data);
                return response()->json([
                    'coupon' => $coupon,
                ]);
            }else{
                return response()->json([
                    'error' => 'sorry,your coupon is expired',
                ]);
            }
        }
        return response()->json([
            'error' => 'Invalid Coupon',
        ]);
    }

    //delete coupon
    public function deleteCoupon(){
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return back()->with(['success'=>'coupon deleted successfully']);
    }

    //get request coupon data
    private function requestCouponData($coupon){
        $subTotal = Session::get('subTotal');
        $discountAmount = round($subTotal * $coupon->coupon_discount/100);
        $GrandTotal = $subTotal - $discountAmount;
        return [
            'couponCode' => $coupon->coupon_code,
            'couponDiscount' => $coupon->coupon_discount,
            'discontAmount' => $discountAmount,
            'GrandTotal' => $GrandTotal,
        ];
    }
}