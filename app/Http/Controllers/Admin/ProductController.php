<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //redirect to index page
    public function index(){
        $data = Product::get();
        return view('admin.product.index')->with(['data'=> $data]);
    }
    //redirect create page
    public function createProduct(){
        $brands = Brand::get();
        $categories = Category::get();
        return view('admin.product.create')->with([
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    //get subcategory with ajax
    public function getSubCategory(Request $request){
        $subCategories = SubCategory::where('category_id',$request->id)->get();
        return response()->json([
            'subCategories' => $subCategories,
        ]);
    }
    //get sub-subcategory with ajax
    public function getSubSubCategory(Request $request){
        $subsubCategoires = SubSubCategory::where('subcategory_id',$request->id)->get();
        return response()->json([
            'subsubCategories' => $subsubCategoires
        ]);
    }

    //store product data
    public function storeProduct(Request $request){
        //validation
        $validation = $this->productValidation($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        //get preview image
        $file = $request->file('previewImage');
        $fileName = uniqid().'_'.$file->getClientOriginalName();
        //get data
        $data = $this->requestProductData($request,$fileName);
        //store data
        $file->move(public_path().'/uploads/products/',$fileName);
        $productId = Product::insertGetId($data);

        //check multi image
        if($request->hasFile('multiImage')){
            $multiImageFiles = $request->file('multiImage');
            foreach($multiImageFiles as $img){
                $multiImageName = uniqid().'_'.$img->getClientOriginalName();
                //store image
                $img->move(public_path().'/uploads/products/',$multiImageName);
                MultiImage::create([
                    'productid_' => $productId,
                    'image' => $multiImageName,
                ]);
            }

        }
        dd('success');

    }

    //get request data
    private function requestProductData($request,$fileName){
        return [
            'brand_id' => $request->brandId,
            'category_id' => $request->categoryId,
            'subcategory_id' => $request->subCategoryId,
            'subsubcategory_id' => $request->subsubCategoryId,
            'name' => $request->name,
            'short_description' => $request->smallDescription,
            'long_description' => $request->longDescription,
            'preview_image' => $fileName,
            'original_price' => $request->originalPrice,
            'selling_price' => $request->sellingPrice,
            'discount_price' => $request->discountPrice,
            'publish_status' => $request->publishStatus,
            'special_offer' => $request->specialOffer,
            'featured' => $request->featured,
        ];
    }

    //validation
    private function productValidation($request){
        return Validator::make($request->all(),[
            'brandId' => 'required',
            'categoryId' => 'required',
            'subCategoryId' => 'required',
            'subsubCategoryId' => 'required',
            'name' => 'required',
            'smallDescription' => 'required',
            'longDescription' => 'required',
            'previewImage' => 'required',
            'originalPrice' => 'required',
            'sellingPrice' => 'required',
            'discountPrice' => 'required',
            'publishStatus' => 'required',
            'specialOffer' => 'required',
            'featured' => 'required',
        ]);
    }

}