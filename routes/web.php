<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::group(['middleware' => 'web'], function () {
    
Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::get('/resend-email-verification',[HomeController::class,'resendEmailVerification'])->name('resend-email-verification');
Route::get('/admin/user',[AdminController::class,'user'])->name('admin/user');
Route::get('/admin/category',[AdminController::class,'view_category'])->name('admin/category');
Route::post('/admin/add_category',[AdminController::class,'add_category'])->name('admin/add_category');
Route::get('/admin/delete{id}',[AdminController::class,'delete'])->name('admin/delete');
Route::get('/admin/product',[AdminController::class,'product'])->name('admin/product');
Route::get('/admnin/product/create',[AdminController::class,'productcreate'])->name('admnin/product/create');
Route::post('/admin/product/save',[AdminController::class,'productsave'])->name('admin/product/save');
Route::get('/admin/product/update{id}',[AdminController::class,'productupdate'])->name('admin/product/update');
Route::get('/admin/product/delete{id}',[AdminController::class,'productdelete'])->name('admin/product/delete');
Route::get('/admin/product/read{id}',[AdminController::class,'productread'])->name('admin/product/read');
Route::get('/admin/user/read{id}',[AdminController::class,'userread'])->name('admin/user/read');
Route::get('/admin/user/update{id}',[AdminController::class,'userupdate'])->name('admin/user/update');
Route::get('/admin/user/delete{id}',[AdminController::class,'userdelete'])->name('admin/user/delete');
Route::get('/admin/user/create',[AdminController::class,'usercreate'])->name('admin/user/create');
Route::post('/admin/user/save',[AdminController::class,'usersave'])->name('admin/user/save');
Route::get('/admin/orders',[AdminController::class,'order'])->name('admin/orders');
Route::get('/order/search',[AdminController::class,'ordersearch'])->name('order/search');
Route::get('/delivered{id}',[AdminController::class,'delivered'])->name('delivered');
Route::get('/print_pdf{id}',[AdminController::class,'print_pdf'])->name('print_pdf');
    // Client side url
Route::any('/user/addtocart{id}',[HomeController::class,'useraddtocart'])->name('user/addtocart');
Route::any('/user/cartlist',[HomeController::class,'cartlist'])->name('user/cartlist');
Route::get('/javascriptcart',[HomeController::class,'javascriptcart'])->name('javascriptcart');
Route::get('/user/productdetails{id}',[HomeController::class,'productdetails'])->name('user/productdetails');
Route::get('/user/removecart{id}',[HomeController::class,'removecart'])->name('user/removecart');
Route::get('/user/cash_on_delivery',[HomeController::class,'cash_on_delivery'])->name('user/cash_on_delivery');
Route::post('/savecartdata',[HomeController::class,'savecartdata'])->name('savecartdata');
Route::any('/stripe{totalprice}',[HomeController::class,'stripe'])->name('stripe');
Route::get('/show_order',[HomeController::class,'show_order'])->name('show_order');
Route::get('/cancel_order{id}',[HomeController::class,'cancel_order'])->name('cancel_order');
Route::get('/comments',[HomeController::class,'comments'])->name('comments');
Route::post('/commentspost',[HomeController::class,'commentspost'])->name('commentspost');
Route::get('/productsearch',[HomeController::class,'productsearch'])->name('productsearch');
Route::get('/searchproduct',[HomeController::class,'searchproduct'])->name('searchproduct');
Route::get('/all_product',[HomeController::class,'all_product'])->name('all_product');


// Google Id With Sign IN 
Route::get('/auth/google',[GoogleController::class,'googlepage'])->name('auth/google');
Route::get('/auth/google/callback',[GoogleController::class,'googlecallback'])->name('auth/google/callback');

    Route::post('stripe{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');

});

