<?php

use App\Http\Controllers\AdminController;
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
    // Client side url
Route::get('/user/addtocart{id}',[HomeController::class,'useraddtocart'])->name('user/addtocart');
Route::get('/user/cartlist',[HomeController::class,'cartlist'])->name('user/cartlist');

});

