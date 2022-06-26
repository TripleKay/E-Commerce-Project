<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        //request
        //product vartiant id[ product_id, color_id,size_id ] + qty
        //stock check ( variant stock > 0) => instock
        //qty stock check (variant stock < qty ) => unavi stock
        //create or add to session ( checking )

    }
}