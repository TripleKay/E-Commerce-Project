<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
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
        $categories = Category::get();
        return view('frontEnd.index')->with([
            'products'=>$products,
            'newProduct'=>$newProduct,
            'brands'=>$brands,
            'categories' => $categories,
        ]);
    }

    //Products by category page
    public function categoryProduct($id){
        $products = Product::where('category_id',$id)->get();
        $categories = Category::get();
        return view('frontEnd.categoryProduct')->with([
            'products' => $products,
            'categories' => $categories,
        ]);;
    }

    //Products by category page
    public function subcategoryProduct($id){
        $products = Product::where('subcategory_id',$id)->get();
        $categories = Category::get();
        return view('frontEnd.categoryProduct')->with([
            'products' => $products,
            'categories' => $categories,
        ]);;
    }

    //Products by category page
    public function subsubcategoryProduct($id){
        $products = Product::where('subsubcategory_id',$id)->get();
        $categories = Category::get();
        return view('frontEnd.categoryProduct')->with([
            'products' => $products,
            'categories' => $categories,
        ]);;
    }

    //detail
    public function showProduct($id){
        $product = Product:: where('product_id',$id)->first();
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
        ]);
    }

    //getProductSize ajax
    public function getProductSize(Request $request){
        $sizes = ProductVariant::select('product_variants.*','product_sizes.name as sizeName')
                        ->join('product_sizes','product_sizes.size_id','product_variants.size_id')
                        ->where('product_variants.product_id',$request->productId)
                        ->where('product_variants.color_id',$request->colorId)
                        ->get();
        return response()->json([
            'sizes'=> $sizes,
        ]);
    }


}