<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function home()
{
    $products = Product::all();

    $auth_user = Auth::user();

    if ($auth_user) {
        $count = Cart::where('user_id', $auth_user->id)->count();
    } else {
        $count = 0;
    }

    return view("home.index", compact('products', 'count'));
}

    public function login_home (){

        $products = Product::all();

        $auth_user = Auth::user();
        if($auth_user){       
            $count = Cart::where('user_id',$auth_user->id)->count();}
            else {
               $count =0;
            }
        return view("home.index",compact('products','count'));
    }
    public function product_details(Product $product){
        $products = Product::all();

        $auth_user = Auth::user();
        if($auth_user){       
         $count = Cart::where('user_id',$auth_user->id)->count();}
         else {
            $count =0;
         }

        return view('home.productDetails', compact('product','count'));
    }

    public function add_cart(Product $product){

        $user_id = Auth::user()->id;
        
        $cart_product = new Cart;

        $cart_product->user_id = $user_id ;

        $cart_product->product_id = $product->id ;

        $cart_product->save();

        toastr()->closeButton()->timeOut(2500)->addSuccess('Product added to cart successfully');
        return redirect()->back()->with('success','Product added to cart successfully ! ');


    }

    public function mycart(){

        if (Auth::user()) {
            $user = Auth::user();
            $count = Cart::where('user_id',$user->id)->count();
            $cart = Cart::where('user_id',$user->id)->get();

        }

        return view('home.mycart',compact('count','cart'));
    }

    public function delete_item($id){


        $cart = Cart::find($id);

        $cart->delete();

        toastr()->closeButton()->timeOut(2500)->addSuccess('Item deleted successfully');
        return redirect()->back()->with('success','Item added successfully ! ');

    }

    public function make_order(Request $request){

        if(Auth::user()){
        $user = Auth::user();
        $request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'address'=>'required|string|max:255',
        ]);

        $user_id = $user->id;

        $name = $request['name'];
        $phone = $request['phone'];
        $rec_address = $request['address'];
        $cart = Cart::where('user_id',$user_id)->get();

        foreach ($cart as $item) {
            
            $order = new Order;

            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $rec_address;
            $order->product_id = $item->product_id;
            $order->user_id = $user_id;
            $order->save();


        }

        foreach ($cart as $removeable) {
            $removeable->delete();
        }

        toastr()->closeButton()->timeOut(2500)->addSuccess('Order passed successfully');
        return redirect()->back()->with('success','Order passed successfully ! ');

        }
    }
}
