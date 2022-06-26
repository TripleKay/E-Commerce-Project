<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Middleware\AdminCheckMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin#profile');
            }else if(Auth::user()->role == 'user'){
                return redirect()->route('frontend#index');
            }
        }
    })->name('dashboard');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware'=> [AdminCheckMiddleware::class]],function(){
    // brand
    Route::get('brand',[BrandController::class,'index'])->name('admin#brand');
    Route::post('brand/create',[BrandController::class,'createBrand'])->name('admin#createBrand');
    Route::get('brand/edit/{id}',[BrandController::class,'editBrand'])->name('admin#editBrand');
    Route::post('brand/edit/{id}',[BrandController::class,'updateBrand'])->name('admin#updateBrand');
    Route::get('brand/delete/{id}',[BrandController::class,'deleteBrand'])->name('admin#deleteBrand');

    //category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin#editCategory');
    Route::post('category/edit/{id}',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');
    Route::get('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');

    //subCategory
    Route::get('subcategory',[SubCategoryController::class,'index'])->name('admin#subCategory');
    Route::post('subcategory/create',[SubCategoryController::class,'createSubCategory'])->name('admin#createSubCategory');
    Route::get('subcategory/edit/{id}',[SubCategoryController::class,'editSubCategory'])->name('admin#editSubCategory');
    Route::post('subcategory/edit/{id}',[SubCategoryController::class,'updateSubCategory'])->name('admin#updateSubCategory');
    Route::get('subcategory/delete/{id}',[SubCategoryController::class,'deleteCategory'])->name('admin#deleteSubCategory');

    //subsubCategory
    Route::get('subsubCategory',[SubSubCategoryController::class,'index'])->name('admin#subSubCat');
    Route::post('subsubCategory/subCategory',[SubSubCategoryController::class,'getSubCategory'])->name('admin#getSubCategory');
    Route::post('subsubCategory/create',[SubSubCategoryController::class,'createSubSubCat'])->name('admin#createSubSubCat');
    Route::get('subsubCategory/edit/{id}',[SubSubCategoryController::class,'editSubSubCat'])->name('admin#editSubSubCat');
    Route::post('subsubCategory/edit/{id}',[SubSubCategoryController::class,'updateSubSubCat'])->name('admin#updateSubSubCat');
    Route::get('subsubCategory/delete/{id}',[SubSubCategoryController::class,'deleteSubSubCat'])->name('admin#deleteSubSubCat');

    //color
    Route::get('product/color',[ProductColorController::class,'index'])->name('admin#color');
    Route::post('product/color/create',[ProductColorController::class,'createColor'])->name('admin#createColor');
    Route::get('product/color/edit/{id}',[ProductColorController::class,'editColor'])->name('admin#editColor');
    Route::post('product/color/update/{id}',[ProductColorController::class,'updateColor'])->name('admin#updateColor');
    Route::get('product/color/delete/{id}',[ProductColorController::class,'deleteColor'])->name('admin#deleteColor');

    //size
    Route::get('product/size',[ProductSizeController::class,'index'])->name('admin#size');
    Route::post('product/size/create',[ProductSizeController::class,'createSize'])->name('admin#createSize');
    Route::get('product/size/edit/{id}',[ProductSizeController::class,'editSize'])->name('admin#editSize');
    Route::post('product/size/update/{id}',[ProductSizeController::class,'updateSize'])->name('admin#updateSize');
    Route::get('product/size/delete/{id}',[ProductSizeController::class,'deleteSize'])->name('admin#deleteSize');

    //products
    Route::get('product',[ProductController::class,'index'])->name('admin#product');
    Route::post('product/subCategory',[ProductController::class,'getSubCategory'])->name('admin#productSubCategory');
    Route::post('product/subsubCategory',[ProductController::class,'getSubSubCategory'])->name('admin#productSubSubCategory');
    Route::get('product/create',[ProductController::class,'createProduct'])->name('admin#createProduct');
    Route::post('product/store',[ProductController::class,'storeProduct'])->name('admin#storeProduct');
    Route::get('product/edit/{id}',[ProductController::class,'editProduct'])->name('admin#editProduct');
    Route::post('product/multiImg/delete',[ProductController::class,'deleteImg'])->name('admin#deleteMultiImg');
    Route::post('product/update/{id}',[ProductController::class,'updateProduct'])->name('admin#updateProduct');
    Route::get('product/detail/{id}',[ProductController::class,'showProduct'])->name('admin#showProduct');
    Route::get('product/delete/{id}',[ProductController::class,'deleteProduct'])->name('admin#deleteProduct');

    //products variant
    Route::get('product/variant',[ProductVariantController::class,'index'])->name('admin#productVariant');
    Route::get('product/variant/create/{id}',[ProductVariantController::class,'createVariant'])->name('admin#createVariant');
    Route::post('product/variant/store/',[ProductVariantController::class,'storeVariant'])->name('admin#storeVariant');
    Route::get('product/variant/delete/{id}',[ProductVariantController::class,'deleteVariant'])->name('admin#deleteVariant');
    Route::get('product/variant/edit/{id}',[ProductVariantController::class,'editVariant'])->name('admin#editVariant');
    Route::post('product/variant/update/{id}',[ProductVariantController::class,'updateVariant'])->name('admin#updateVariant');

    //admin profile
    Route::get('profile/edit',[ProfileController::class,'index'])->name('admin#profile');
    Route::post('profile/edit',[ProfileController::class,'editProfile'])->name('admin#editProfile');
    Route::get('profile/password/edit',[ProfileController::class,'editPassword'])->name('admin#editPassword');
    Route::post('profile/password/edit',[ProfileController::class,'updatePassword'])->name('admin#updatePassword');

});

Route::group(['namespace' => 'FrontEnd'],function(){
    Route::get('/',[FrontEndController::class,'index'])->name('frontend#index');
    Route::get('category/{id}/product/',[FrontEndController::class,'categoryProduct'])->name('frontend#catProduct');
    Route::get('subcategory/{id}/product/',[FrontEndController::class,'subcategoryProduct'])->name('frontend#subcatProduct');
    Route::get('subsubcategory/{id}/product/',[FrontEndController::class,'subsubcategoryProduct'])->name('frontend#subsubcatProduct');

    //product detail
    Route::get('product/detail/{id}',[FrontEndController::class,'showProduct'])->name('frontend#showProduct');
    Route::post('product/detail/size',[FrontEndController::class,'getProductSize'])->name('frontend#getProductSize');

    //cart
    Route::post('product/addToCart/',[CartController::class,'addToCart'])->name('frontend#addToCart');
});