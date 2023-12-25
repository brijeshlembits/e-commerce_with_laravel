<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

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
        $order = Order::all()->count();
        $user = User::all()->count();
        if ($usertype == '1') {
            return view('admin.home', compact('product', 'category', 'user','order'));
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
                if ($cart = Cart::where('product_id', $id)->first()) {
                    if ($cart->product_id == $id) {
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
        if (Auth::id()) {

            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->get();
            if ($cart) {
                return view('home.cart', compact('cart'));
            } else {
                return redirect()->route('redirect');
            }

            return view('home.cart', 'session');
        } else {
            return redirect('login');
        }
    }
    public function productdetails(Request $request, $id)
    {
        $product = Product::find($id);
        return view('home.productdetails', compact('product'));
    }
    public function removecart(Request $request, $id)
    {
        $check = Cart::find($id);
        $check->delete();
        return redirect()->back();
    }
    public function cash_on_delivery(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;

        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $order = new Order();
            $order->name = $carts->name;
            $order->email = $carts->email;
            $order->address = $carts->address;
            $order->phone = $carts->phone;
            $order->user_id = $carts->user_id;
            $order->product_title = $carts->product_title;
            $order->image = $carts->image;
            $order->price = $carts->price;
            $order->product_id = $carts->product_id;
            $order->quantity = $carts->quantity;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'proccessing';
            $order->save();
            $cart_id=$carts->id;
            $cart_data=Cart::find($cart_id);
            $cart_data->delete();
        }
        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon....');
    }
    public function stripe(Request $request,$totalprice){
        return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $paymentIntent = \Stripe\PaymentIntent::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "payment_method_data" => [
                "type" => "card",
                "card" => [
                    "token" => $request->stripeToken,
                ],
            ],
            "confirm" => true,
            "return_url" => "https://yourdomain.com/return", // Replace with your actual return URL
            "automatic_payment_methods" => [
                "enabled" => true,
                "allow_redirects" => "never",
            ],
        ]);
        $user = Auth::user();
        $userid = $user->id;

        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $order = new Order();
            $order->name = $carts->name;
            $order->email = $carts->email;
            $order->address = $carts->address;
            $order->phone = $carts->phone;
            $order->user_id = $carts->user_id;
            $order->product_title = $carts->product_title;
            $order->image = $carts->image;
            $order->price = $carts->price;
            $order->product_id = $carts->product_id;
            $order->quantity = $carts->quantity;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'proccessing';
            $order->save();
            $cart_id=$carts->id;
            $cart_data=Cart::find($cart_id);
            $cart_data->delete();
        }
        
        Session::flash('success', 'Payment successful!');
        
        return back();
        
        
        
    }
    public function show_order(Request $request){
        if(Auth::user()){
            $user=Auth::user();
            $orders=Order::where('user_id',$user->id)->get();
            return view('home.show_order',compact('orders'));
        }else{
            return redirect('login');
        }
    }
    public function cancel_order(Request $request,$id){
        $orderid=Order::find($id);
        $orderid->delivery_status="User has cancel the order";
        $orderid->save();
        
        return redirect()->back()->with('message','Your Order has been Cancel');
        
    }
}
