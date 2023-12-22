<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function user(Request $request)
    {
        $model=User::all();
        return view('admin.user1',compact('model'));
    }
    public function view_category(Request $request)
    {
        $model = Category::all();


        return view('admin.category', compact('model'));
    }
    public function add_category(Request $request)
    {
        try {
            // Create a new instance of the Category model
            $data = new Category();

            $data->category_name = $request->category_name;



            $data->save();

            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Category added successfully',
                'next' => 'refresh'
            ]);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['status' => 0, 'message' => 'Error adding category: ' . $e->getMessage()]);
        }
    }
    public function delete(Request $request, $id)
    {
        try {
            $idcheck = Category::find($id);
            $idcheck->delete();
            return redirect('admin/category');
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['status' => 0, 'message' => 'Error adding category: ' . $e->getMessage()]);
        }
    }
    public function productdelete(Request $request, $id)
    {
        try {
            $idcheck = Product::find($id);
            $idcheck->delete();
            return redirect('admin/product');
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['status' => 0, 'message' => 'Error adding category: ' . $e->getMessage()]);
        }
    }
    public function product(Request $request)
    {
        $model = Product::all();

        return view('admin.product', compact('model'));
    }
    public function productcreate(Request $request)
    {
        $category=Category::all();
        return view('admin.productview',compact('category'));
    }
    public function productsave(Request $request)
    {
        try {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'disprice' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            dd($request);
            return redirect('admin/product')
                ->withErrors($validator)
                ->withInput();
        }
        $id=$request->id;
        if($id){
            $product=Product::find($id);
        }else{

            $product = new Product();
        }
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('disprice');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
    // dd($request->input('image'));
        // File handling
        
            $filename = $request->File('image') . "." . $request->image->extension();
            $image = $request->image->move('images/', $filename);
            $product->image = $image;
        
    
        $product->save();
    
        return redirect('admin/product')->with('success', 'Product added successfully');
    } catch (\Exception $e) {
        // Return an error response if an exception occurs
        return response()->json(['status' => 0, 'message' => 'Error adding product: ' . $e->getMessage()]);
    }
    }
    public function productupdate( Request $request,$id)
    {
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.productupdate',compact('product','category'));

    }
    public function userupdate( Request $request,$id)
    {
        $user=User::find($id);
       
        return view('admin.userupdate',compact('user'));

    }
    public function usercreate(Request $request)
    {
        $user=User::all();
        return view('admin.userview',compact('user'));
    }
    public function userdelete(Request $request, $id)
    {
        try {
            $idcheck = User::find($id);
            $idcheck->delete();
            return redirect('admin/user');
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['status' => 0, 'message' => 'Error adding category: ' . $e->getMessage()]);
        }
    }
    public function usersave(Request $request)
    {
        try {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'usertype' => 'required',
            
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            dd($request);
            return redirect('admin/product')
                ->withErrors($validator)
                ->withInput();
        }
        $id=$request->id;
        if($id){
            $user=User::find($id);
        }else{

            $user = new User();
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->usertype = $request->input('usertype');
    // dd($request->input('image'));
        // File handling
    
    
        $user->save();
    
        return redirect('admin/user')->with('success', 'User added successfully');
    } catch (\Exception $e) {
        // Return an error response if an exception occurs
        return response()->json(['status' => 0, 'message' => 'Error adding product: ' . $e->getMessage()]);
    }
    }
    

}
