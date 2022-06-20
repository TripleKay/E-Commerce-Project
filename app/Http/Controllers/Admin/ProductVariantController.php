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
        $product = Product::select('product_id','name')->where('product_id',$id)->first();
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
    public function storeVariant(Request $request){
        $validation = Validator::make($request->all(),[
            'avaiStock' => 'required'
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $data = $this->requestVariantData($request);

        ProductVariant::create($data);

        return back()->with(['success'=>'variant create successfully...']);
    }

    //request variant data
    private function requestVariantData($request){
        $data = [
            'product_id' => $request->productId,
            'available_stock' => $request->avaiStock,
        ];
        if($request->colorId){
            $data['color_id'] = $request->colorId;
        }
        if($request->sizeId){
            $data['size_id'] = $request->sizeId;
        }
        return $data;
    }

    //redirect edit page
    public function editVariant($id){
        $variant = ProductVariant::where('product_variants',$id)->first();

        $product = Product::select('product_id','name')->where('product_id',$variant->product_id)->first();
        $colors = ProductColor::get();
        $sizes = ProductSize::get();
        //lists
        $data = ProductVariant::where('product_id',$variant->product_id)->get();
        return view('admin.productVariant.edit')->with([
            'data'=>$data,
            'product'=>$product,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'variant' => $variant,
        ]);
    }

    //update page
    public function updateVariant(Request $request,$id){
        $validation = Validator::make($request->all(),[
            'avaiStock' => 'required'
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $data = $this->requestVariantData($request);

        ProductVariant::where('product_variants',$id)->update($data);

        return back()->with(['success'=>'variant create successfully...']);
    }

    //delete variant
    public function deleteVariant($id){
        ProductVariant::where('product_variants',$id)->delete();
        return back()->with(['success'=>'product variant deleted successfully']);
    }
}
