<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariantController extends Controller
{
    //redirect create page
    public function createVariant($id){
        $product = Product::where('product_id',$id)->first();
        $colors = ProductColor::get();
        $sizes = ProductSize::get();
        $data = ProductVariant::where('product_id',$id)->get();
        return view('admin.productVariant.create')->with([
            'data'=>$data,
            'product'=>$product,
            'colors'=>$colors,
            'sizes'=>$sizes
        ]);
    }

    //store data
    public function storeVariant(Request $request,$id){
        $validation = Validator::make($request->all(),[
            'colorId' => 'required',
            'sizeId' => 'required',
            'avaiStock' => 'required'
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $data = [
            'product_id' => $id,
            'color_id' => $request->colorId,
            'size_id' => $request->sizeId,
            'available_stock' => $request->avaiStock,
        ];

        ProductVariant::create($data);

        return back()->with(['success'=>'variant create successfully...']);
    }
}