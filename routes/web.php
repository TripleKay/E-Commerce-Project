<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\SubSubCategoryController;

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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['namespace' => 'admin','prefix' => 'admin'],function(){
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

    //products
    Route::get('product',[ProductController::class,'createProduct'])->name('admin#createProduct');

    //color
    Route::get('product/color',[ProductColorController::class,'index'])->name('admin#color');
    Route::post('product/color/create',[ProductColorController::class,'createColor'])->name('admin#createColor');
    Route::get('product/color/edit/{id}',[ProductColorController::class,'editColor'])->name('admin#editColor');
    Route::post('product/color/update/{id}',[ProductColorController::class,'updateColor'])->name('admin#updateColor');
    Route::get('product/color/delete/{id}',[ProductColorController::class,'deleteColor'])->name('admin#deleteColor');

    //color
    Route::get('product/size',[ProductSizeController::class,'index'])->name('admin#size');
    Route::post('product/size/create',[ProductSizeController::class,'createSize'])->name('admin#createSize');
    Route::get('product/size/edit/{id}',[ProductSizeController::class,'editSize'])->name('admin#editSize');
    Route::post('product/size/update/{id}',[ProductSizeController::class,'updateSize'])->name('admin#updateSize');
    Route::get('product/size/delete/{id}',[ProductSizeController::class,'deleteSize'])->name('admin#deleteSize');

});