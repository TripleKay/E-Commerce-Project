<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //index
    public function index(){
        $newProduct = Product::where('publish_status','1')->orderBy('product_id','desc')->limit(6)->get();
        $products = Product::where('publish_status',1)->orderBy('product_id','desc')->get();
        $brands = Brand::get();
        // dd($newProduct->toArray());
        return view('frontEnd.index')->with(['products'=>$products,'newProduct'=>$newProduct,'brands'=>$brands]);
    }

    //detail
    public function showProduct($id){
        $product = Product::
                        where('product_id',$id)->first();
        $multiImages = MultiImage::where('product_id',$id)->get();
        $colors = ProductVariant::select('product_variants.*','product_colors.name as colorName')
                                ->join('product_colors','product_colors.color_id','product_variants.color_id')
                                ->groupBy('product_variants.color_id')
                                ->where('product_variants.product_id',$id)
                                ->get();
        $sizes = ProductVariant::select('product_variants.*','product_sizes.name as sizeName')
                                ->join('product_sizes','product_sizes.size_id','product_variants.size_id')
                                ->groupBy('product_variants.size_id')
                                ->where('product_variants.product_id',$id)
                                ->get();
                                // dd($colors->toArray());
        return view('frontEnd.detail')->with([
            'product'=>$product,
            'multiImages'=>$multiImages,
            'colors' => $colors,
            'sizes' => $sizes,
            // 'variants'=>$variants
        ]);
    }
}