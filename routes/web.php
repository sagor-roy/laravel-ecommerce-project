<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\BannerController;
use \App\Http\Controllers\Admin\HeadingTitleController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\BrandController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\CouponController;
use \App\Http\Controllers\Admin\OrdersController;
use \App\Http\Controllers\Frontend\FrontHomeController;
use \App\Http\Controllers\Frontend\ShopController;
use \App\Http\Controllers\Frontend\CateProduct;
use \App\Http\Controllers\Frontend\ProductDetail;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\DiscountController;
use \App\Http\Controllers\Frontend\UserLoginController;
use \App\Http\Controllers\Frontend\UserRegisterController;
use \App\Http\Controllers\Frontend\UserProfileController;
use \App\Http\Controllers\Frontend\CheckoutController;
use \App\Http\Controllers\Frontend\OrderController;
use \App\Http\Controllers\Frontend\WishlistController;
use \App\Http\Controllers\Frontend\InvoiceController;
use \App\Http\Controllers\Frontend\CommentController;
use \App\Http\Controllers\Frontend\SearchController;
use \App\Http\Controllers\Frontend\RatingController;


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

// AUTH
Auth::routes();



// FRONTEND CONTROLLER
Route::get('/',[FrontHomeController::class,'index'])->name('home');
Route::get('shop',[ShopController::class,'index'])->name('shop');
Route::get('category/{id}',[CateProduct::class,'show'])->name('catePro');
Route::get('product-detail/{id}',[ProductDetail::class,'show'])->name('productDetail');
Route::post('cart',[CartController::class,'store'])->name('cart');
Route::post('detailCart',[ProductDetail::class,'store'])->name('detailCart');
Route::get('shooping-cart',[CartController::class,'index'])->name('shoopingCart');
Route::post('update-quantity/{id}',[CartController::class,'update'])->name('updateQuan');
Route::get('product-delete/{id}',[CartController::class,'destroy'])->name('productDelete');
Route::get('checkout',[CheckoutController::class,'index'])->name('checkout')->middleware('customer');
Route::post('order',[OrderController::class,'store'])->name('orderStore');
Route::post('order-manage',[OrderController::class,'orderManage'])->name('orderManage');
Route::post('order-manage-update/{id}',[OrderController::class,'orderMangeUpdate'])->name('orderMangeUpdate');
Route::get('order-success',[UserProfileController::class,'orderSuccessView'])->name('orderSuccessView')->middleware('customer');
Route::post('wishlist',[WishlistController::class,'store'])->name('wishlist');
Route::get('wishlist',[WishlistController::class,'index'])->name('wishlistHome');
Route::get('wish-list-delete/{id}',[WishlistController::class,'destroy'])->name('wishlistDestroy');
Route::post('comment',[CommentController::class,'store'])->name('comment');
Route::get('comment-delete/{id}',[CommentController::class,'destroy'])->name('commentDelete');
Route::post('product-search',[SearchController::class,'store'])->name('search');
Route::post('/employees/getEmployees/',[SearchController::class,'getEmployees'])->name('employees.getEmployees');
// RATING CONTROLLER
Route::post('rating/update/{id}',[RatingController::class,'update'])->name('rating');

// ADMIN CONTROLLER
Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function(){
   // DASHBOARD CONTROLLER
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    // BANNER CONTROLLER
    Route::get('banner',[BannerController::class,'index'])->name('banner');
    // HEADING TITLE CONTROLLER
    Route::get('heading-title',[HeadingTitleController::class,'index'])->name('headingTitle');
    // CATEGORY CONTROLLER
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('category');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/{id}/update',[CategoryController::class,'show'])->name('show');
        Route::put('/{id}/update',[CategoryController::class,'update'])->name('update');
        Route::delete('/{id}/delete',[CategoryController::class,'destroy'])->name('destroy');
    });

    // BRAND CONTROLLER
    Route::prefix('brand')->name('brand.')->group(function(){
        Route::get('/',[BrandController::class,'index'])->name('brand');
        Route::post('/store',[BrandController::class,'store'])->name('store');
        Route::get('/{id}/update',[BrandController::class,'show'])->name('show');
        Route::put('/{id}/update',[BrandController::class,'update'])->name('update');
        Route::delete('/{id}/delete',[BrandController::class,'destroy'])->name('destroy');
    });

    // ORDER CONTROLLER
    Route::prefix('order/')->name('order.')->group(function(){
        Route::get('order-item',[OrdersController::class,'index'])->name('order');
        Route::get('order-manage',[OrdersController::class,'orderMange'])->name('orderMange');
        Route::get('order-detail/{id}',[OrdersController::class,'orderDetail'])->name('orderDetail');
        Route::get('order-delete/{id}',[OrdersController::class,'destroy'])->name('orderDelete');
        Route::get('invoice/{id}',[InvoiceController::class,'show'])->name('invoice');
    });

     // PRODUCT CONTROLLER
    Route::prefix('product/')->name('product.')->group(function(){
        // ADD PRODUCT
        Route::get('add-product',[ProductController::class,'addProduct'])->name('addProduct');
        Route::post('store',[ProductController::class,'store'])->name('store');
        Route::get('{id}/update',[ProductController::class,'show'])->name('show');
        Route::put('/{id}/update',[ProductController::class,'update'])->name('update');
        Route::delete('{id}/delete',[ProductController::class,'destroy'])->name('destroy');
        // MANAGE PRODUCT
        Route::get('manage-product',[ProductController::class,'manageProduct'])->name('manageProduct');
    });
     // COUPON CONTROLLER
    Route::get('coupon',[CouponController::class,'index'])->name('coupon');
    Route::post('store',[CouponController::class,'store'])->name('couponStore');
    Route::get('coupon-delete/{id}',[CouponController::class,'destroy'])->name('destroy');
});

// DISCOUNT COUPON CONTROLLER
Route::post('discount-coupon',[DiscountController::class,'store'])->name('discountCoupon');
Route::get('coupon-remove',[DiscountController::class,'couponDestroy'])->name('couponDestroy');

// USER LOGIN CONTROLLER
Route::prefix('user/')->name('user.')->group(function(){
    Route::get('login',[UserLoginController::class,'index'])->name('login')->middleware('AlreadyLoggedIn');
    Route::get('register',[UserRegisterController::class,'index'])->name('register')->middleware('AlreadyLoggedIn');
    Route::post('store',[UserRegisterController::class,'store'])->name('store');
    Route::prefix('profile/')->name('profile.')->group(function(){
        Route::get('my-account',[UserProfileController::class,'profile'])->name('home')->middleware('customer');
        Route::post('my-account',[UserProfileController::class,'check'])->name('myProfile');
        Route::post('update-account/{id}',[UserProfileController::class,'update'])->name('updatePro');
        Route::post('update-pass/{id}',[UserProfileController::class,'updatePass'])->name('updatePass');
        Route::get('update-account',[UserProfileController::class,'updateProfile'])->name('updateProfile')->middleware('customer');
        Route::get('change-password',[UserProfileController::class,'changePass'])->name('changePass')->middleware('customer');
        Route::get('my-order',[UserProfileController::class,'myOrder'])->name('myOrder')->middleware('customer');
        //Route::get('my-order-detail',[UserProfileController::class,'myOrderDetail'])->name('myOrderDetail')->middleware('customer');
        // LOGOUT
        Route::get('logout',[UserProfileController::class,'logout'])->name('logout');
    });
});
