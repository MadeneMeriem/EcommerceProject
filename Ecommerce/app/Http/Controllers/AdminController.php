<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;

class AdminController extends Controller
{
    public function index(){

        $users = User::where('usertype','user')->get()->count();
        $products= Product::all()->count();
        $orders = Order::all()->count();
        $delivered_orders = Order::where('status','Delivering')->get()->count();
        return view('admin.index', compact('users','orders','products','delivered_orders'));
    }

    public function view_category() {
        $categories = Category::all();
        return view("admin.category", compact("categories"));
    }
    public function add_category(Request $request){
        $validatedData = $request->validate([
            'category' => 'required|string|max:255', //validating data coming from the user
        ]);
        $category = Category::create(['category_name'=>$validatedData['category']]); 
        // creating a new category using the model with the validated data 
        
        
        $category ->save(); //saving the data 

        toastr()->closeButton()->timeOut(2500)->addSuccess('Category added successfully');

        // a toast message that confirms the add 

        return redirect()->back()->with('success','Category added successfully ! ');
        
    }

    public function delete_category(Category $category){

        $category ->delete();
        toastr()->closeButton()->timeOut(2500)->addSuccess('Category deleted successfully');
        return redirect()->back()->with('success','Category added successfully ! ');

    }

    public function edit_category(Category $category){
        return view('admin.editCategory', compact('category'));
    }

    public function update_category(Request $request, Category $category){
        $request->validate([
            'category_name' => 'required|string|max:255', //validating data coming from the user
        ]);

        $category->category_name = $request->category_name;

        $category->save();
        return redirect('/view_category');
    }




    public function view_product() {
        $products = Product::paginate(3);
        return view("admin.products", compact("products"));
    }
    public function add_product_form (){


        $categories = Category::all(); // Fetch all categories from the database
        
        return view('admin.addProduct', compact('categories')); // Pass the categories to the view
    }
    
    public function add_product(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;


        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }


        $product = Product::create(
            ['title'=>$request['title'],
            'price'=>$request['price'],
            'description'=>$request['description'],
            'category'=>$request['category'],
            'image'=>$imageName,
            'quantity'=>$request['quantity'],
            ]

        );   
        $product->save();  
        
        toastr()->closeButton()->timeOut(2500)->addSuccess('Product added successfully');

        // a toast message that confirms the add 

        return redirect()->back()->with('success','Product added successfully ! ');
        

    }

    public function delete_product(Product $product){

        $imagePath = public_path('images/'.$product->image);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $product->delete();


        toastr()->closeButton()->timeOut(2500)->addSuccess('Product deleted successfully');
        return redirect()->back()->with('success','Product deleted successfully ! ');

    }
    public function edit_product(Product $product){

        $categories = Category::all();
        return view('admin.editPrdForm' , compact('product','categories'));
    }

    public function update_product(Request $request, Product $product){
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            
            $product->image=$imageName;

        }


        $product->title=$request->title;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->save();
        
        return redirect ('/edit-product');
    }

    public function search_product(Request $request){
            $products = Product::where('title' , 'LIKE' ,'%'.$request->search.'%' )->paginate(3);

            return view('admin.products', compact('products'));
    }

    public function order_table(){
        
        $orders = Order::all();

        return view ('admin.orderTable', compact('orders'));
    }
    public function update_status (Request $request , Order $order){

        $order->status = $request->status;;

        $order->save();

        toastr()->closeButton()->timeOut(2500)->addSuccess('Order status updated successfully');
        return redirect()->back();

    }

}
