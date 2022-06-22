<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //index
    public function index(){
        $newProduct = Product::where('publish_status','1')->orderBy('product_id','desc')->limit(6)->get();
        $brands = Brand::get();
        // dd($newProduct->toArray());
        return view('frontEnd.index')->with(['newProduct'=>$newProduct,'brands'=>$brands]);
    }
}