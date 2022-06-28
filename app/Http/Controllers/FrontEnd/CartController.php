<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //add to cart
    public function addToCart(Request $request){
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
                    'error' => 'already added to cart',
                ]);
            }else{
                $data = $this->requestCartData($request,$product);
                $cart[$variant->product_variant_id] = $data;
                Session::put('cart',$cart);
            }
        }else{
            return response()->json([
                'error' => 'quantity must be greater than 0 or max: 10'
            ]);
        }

        return response()->json([
            'success'=> 'add to cart successfully',
        ]);
    }

    //get request cart data
    private function requestCartData($request,$product){
        $data = [
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
}