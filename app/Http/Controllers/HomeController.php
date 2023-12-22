<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::query()->latest()->paginate(10);

        return view('home.userpage', compact('product'));
    }

    public function redirect(Request $request)
    {
        $usertype = Auth::user()->usertype;
        $product = Product::all()->count();
        $category = Category::all()->count();
        $user = User::all()->count();
        if ($usertype == '1') {
            return view('admin.home', compact('product', 'category', 'user'));
        } else {
            $product = Product::query()->latest()->paginate(10);


            return view('home.userpage', compact('product'));
        }
    }
    public function useraddtocart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

          
         
            if ($id) {
                if(  $cart = Cart::where('product_id', $id)->first()){
                if ($cart->product_id == $id ) {
                    if ($request->input('qty')) {
                        $cart->quantity = $request->input('qty');
                    } else {
                        $cart->quantity++;
                    }
                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->address = $user->address;
                    $cart->phone = $user->phone;
                    $cart->user_id = $user->id;
                    $cart->product_title = $product->title;
                    $cart->image = $product->image;
                    $cart->product_id = $product->id;
                    if ($product->discount_price != null) {

                        $cart->price = $product->discount_price * $cart->quantity;
                    } else {
                        $cart->price = $product->price * $cart->quantity;
                    }
                    $cart->save();
                }
            } else {
                    $cart = new Cart();

                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->address = $user->address;
                    $cart->phone = $user->phone;
                    $cart->user_id = $user->id;
                    $cart->product_title = $product->title;
                    $cart->image = $product->image;
                    $cart->product_id = $product->id;
                    if ($request->input('qty')) {
                        $cart->quantity = $request->input('qty');
                    } else {
                        $cart->quantity = 1;
                    }
                    if ($product->discount_price != null) {

                        $cart->price = $product->discount_price * $cart->quantity;
                    } else {
                        $cart->price = $product->price * $cart->quantity;
                    }

                    $cart->save();
                }
            }

            return redirect()->route('redirect');
        } else {
            return redirect('login');
        }
    }
    public function cartlist(Request $request)
    {
        $session = session()->get('cart');
        return view('home.cart', 'session');
    }
    public function productdetails(Request $request, $id)
    {
        $product = Product::find($id);
        return view('home.productdetails', compact('product'));
    }
}
