<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
         //request
        $productId = $request->productId;
        $colorId = $request->colorId;
        $sizeId = $request->sizeId;
        $quantity = $request->qty;

        $variant = ProductVariant::where('product_id',$productId)->where('color_id',$colorId)->where('size_id',$sizeId)->get();

        //product vartiant id[ product_id, color_id,size_id ] + qty
        //stock check ( variant stock > 0) => instock
        //qty stock check (variant stock < qty ) => unavi stock
        //create or add to session ( checking )

        // $cart[$productId] = [
        //     "productId" => $productId,
        //     "colorId" => $colorId,
        //     'sizeId' => $sizeId,
        //     'quantity' => $quantity,
        // ];
        // Session::put('cart',$cart);
        return response()->json([
            'variant'=> $variant,
        ]);
    }
}