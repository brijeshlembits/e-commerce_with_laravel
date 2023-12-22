<?php

namespace App\Http\Controllers;

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
          
        
            return view('home.userpage', compact( 'product'));
        }
    }
    public function useraddtocart(Request $request, $id)
    {
        
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Initialize the quantity to add
        $quantity = 1;
    
        // Get the current cart from the session
        $cart = $request->session()->get('cart', []);
        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            // If it is, increment the quantity
            $cart[$id]['quantity'] += $quantity;
        } else {
            // If it's not, add the product to the cart
            $cart[$id] = [
                'title'   => $product->title,
                'quantity' => $quantity,
                'price'   => $product->price,
                'image'   => $product->image,
            ];
        }
    
        // Store the updated cart back to the session
       
$request->session()->put('cart', $cart);
    
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
    public function cartlist(Request $request)
    {
        return view('home.cart');
    }
}
