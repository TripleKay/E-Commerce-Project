<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TownshipController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontEnd\ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\StateDivisionController;
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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin#dashboard');
            }else if(Auth::user()->role == 'user'){
                return redirect()->route('frontend#index');
            }
        }
    })->name('dashboard');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware'=> [AdminCheckMiddleware::class]],function(){
    //dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin#dashboard');

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

    //coupon
    Route::get('coupon',[CouponController::class,'index'])->name('admin#coupon');
    Route::get('coupon/create',[CouponController::class,'createCoupon'])->name('admin#createCoupon');
    Route::post('coupon/store',[CouponController::class,'storeCoupon'])->name('admin#storeCoupon');
    Route::get('coupon/edit/{id}',[CouponController::class,'editCoupon'])->name('admin#editCoupon');
    Route::post('coupon/update/{id}',[CouponController::class,'updateCoupon'])->name('admin#updateCoupon');
    Route::get('coupon/delete/{id}',[CouponController::class,'deleteCoupon'])->name('admin#deleteCoupon');

    //state & division
    Route::get('statedivision',[StateDivisionController::class,'index'])->name('admin#statedivision');
    Route::post('statedivision/create',[StateDivisionController::class,'createStatedivision'])->name('admin#createStatedivision');
    Route::get('statedivision/edit/{id}',[StateDivisionController::class,'editStatedivision'])->name('admin#editStatedivision');
    Route::post('statedivision/edit/{id}',[StateDivisionController::class,'updateStatedivision'])->name('admin#updateStatedivision');
    Route::get('statedivision/delete/{id}',[StateDivisionController::class,'deleteStatedivision'])->name('admin#deleteStatedivision');

    //city
    Route::get('city',[CityController::class,'index'])->name('admin#city');
    Route::post('city/create',[CityController::class,'createCity'])->name('admin#createCity');
    Route::get('city/edit/{id}',[CityController::class,'editCity'])->name('admin#editCity');
    Route::post('city/edit/{id}',[CityController::class,'updateCity'])->name('admin#updateCity');
    Route::get('city/delete/{id}',[CityController::class,'deleteCity'])->name('admin#deleteCity');

    //township
    Route::get('township',[TownshipController::class,'index'])->name('admin#township');
    Route::post('township/getCity',[TownshipController::class,'getCity'])->name('admin#getCity');
    Route::post('township/create',[TownshipController::class,'createTownship'])->name('admin#createTownship');
    Route::get('township/edit/{id}',[TownshipController::class,'editTownship'])->name('admin#editTownship');
    Route::post('township/edit/{id}',[TownshipController::class,'updateTownship'])->name('admin#updateTownship');
    Route::get('township/delete/{id}',[TownshipController::class,'deleteTownship'])->name('admin#deleteTownship');

    //admin profile
    Route::get('profile/edit',[AdminProfileController::class,'index'])->name('admin#profile');
    Route::post('profile/edit',[AdminProfileController::class,'editProfile'])->name('admin#editProfile');
    Route::get('profile/password/edit',[AdminProfileController::class,'editPassword'])->name('admin#editPassword');
    Route::post('profile/password/edit',[AdminProfileController::class,'updatePassword'])->name('admin#updatePassword');

    //order
    Route::get('order',[AdminOrderController::class,'index'])->name('admin#order');
    Route::get('order/filter/{status}',[AdminOrderController::class,'filterOrder'])->name('admin#filterOrder');
    Route::get('order/detail/{id}',[AdminOrderController::class,'showOrder'])->name('admin#showOrder');
    Route::get('order/confirm/{id}',[AdminOrderController::class,'confirmOrder'])->name('admin#confirmOrder');
    Route::get('order/process/{id}',[AdminOrderController::class,'processOrder'])->name('admin#processOrder');
    Route::get('order/pick/{id}',[AdminOrderController::class,'pickOrder'])->name('admin#pickOrder');
    Route::get('order/ship/{id}',[AdminOrderController::class,'shipOrder'])->name('admin#shipOrder');
    Route::get('order/deliver/{id}',[AdminOrderController::class,'deliverOrder'])->name('admin#deliverOrder');
    Route::get('order/complete/{id}',[AdminOrderController::class,'completeOrder'])->name('admin#completeOrder');

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
    Route::get('myCarts',[CartController::class,'viewCarts'])->name('frontend#viewCarts');
    Route::post('myCarts/update',[CartController::class,'updateCart'])->name('frontend#updateCart');
    Route::get('myCarts/delete/{id}',[CartController::class,'deleteCart'])->name('frontend#deleteCart');
});

Route::group(['prefix' => 'user','namespace' => 'User'],function(){
    Route::get('wishlist',[WishListController::class,'index'])->name('user#wishlist');
    Route::get('getWishlist',[WishListController::class,'getWishlist'])->name('user#getWishlist');
    Route::post('wishlist/add/{id}',[WishListController::class,'addWishlist'])->name('user#addWishlist');
    Route::get('wishlist/delete/{id}',[WishListController::class,'deleteWishlist'])->name('user#deleteWishlist');

    //checkout
    Route::get('checkout',[CheckoutController::class,'checkoutPage'])->name('user#checkout');
    Route::post('getCity',[CheckoutController::class,'getCity'])->name('user#getCity');
    Route::post('getTownship',[CheckoutController::class,'getTownship'])->name('user#getTownship');

    //coupon
    Route::post('applyCoupon',[CartController::class,'applyCoupon'])->name('user#applyCoupon');
    Route::get('deleteCoupon',[CartController::class,'deleteCoupon'])->name('user#deleteCoupon');

    //order
    Route::post('createOrder',[OrderController::class,'createOrder'])->name('user#createOrder');

    //profile
    Route::get('profile',[ProfileController::class,'index'])->name('user#profile');
    Route::get('orders',[ProfileController::class,'myOrder'])->name('user#myOrder');
    Route::get('orders/detail/{id}',[ProfileController::class,'orderDetail'])->name('user#orderDetail');

});