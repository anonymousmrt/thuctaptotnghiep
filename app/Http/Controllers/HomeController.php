<?php

namespace App\Http\Controllers;

use App\Addon;
use App\Order;
use App\Category;
use App\Product;
use App\Http\Controllers\DB;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function dashboard()
    {
        return view('admin.index');
    }

//    public function category($id)
//    {
//        $products = Product::where('category_id', $id)->paginate(10);
//        $categories = $this->getCategories();
//        return view('frontend.categories.list', compact('products', 'categories'));
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories($limit = null)
    {
        if ($limit == null) {
            return Category::paginate(5);
        } else {
            return Category::limit($limit)->paginate(5);
        }
    }

//    public function home()
//    {
//        $products = Product::orderBy('id', 'DESC')->limit(6)->get();
//        return view('frontend.pages.home', compact('products'));
//    }

    public function index()
    {
        $products = Product::where('status',1)->get();
        $addons = Addon::where('status',1)->limit(10)->get();
        return view('frontend.pages.index', compact('products', 'addons'));
    }

   public function getList()
   {
       $products = $this->getProducts();
       $categories = $this->getCategories();

       return view('frontend.products.product-list', compact('products', 'categories'));
   }

   public function getProducts($order = null, $limit = null)
   {
       if ($limit == null) {
           return Product::paginate(10);
       }
       return Product::orderBy('id', $order)->paginate(10);
   }

    public function productDetail($id)
    {
        $products = Product::all();
        $product = Product::findOrFail($id);
        return view('frontend.pages.product', compact('products','product'));
    }


    public function addonDetail($id)
    {
        $addon = Addon::findOrFail($id);

        return view('frontend.addons.detail', compact('addon'));
    }

//    public function buyNow($id){
//
//        if(Auth::guest()){
//            return Redirect::to('/login');
//        }else{
//            $addon =  Addon::find($id);
//            return view('frontend.carts.index', compact('addon'));
//        }
//    }

    public function buyNow(Request $request){

        if(Auth::guest()){
            return 0;
        }else{
            $order =  Order::where('user_id', Auth::user()->id)->where('addon_id', $request->addon)->first();
            if(!empty($order) && $order->status==1){
                return 1;
            }
        }
    }


    public function addOrder(Request $request,  $addon){
//        return $request->type;
        $check = Order::select('status')->where('user_id', Auth::user()->id)->where('addon_id', $addon)->first();

        if(empty($check)){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->addon_id = $addon;
            if($order->save()){
                return $order->id;
            }
        }elseif($check->status==0){
            Order::where('user_id', Auth::user()->id)->where('addon_id', $addon)
                ->update(['status' => 1]);
            return 0;
        }elseif($check->status ==1){
            return 1;
        }
        return 3;
    }

    public function getProfile(){
        $orders = Order::where('user_id', Auth::user()->id)->get(); //->where('status', 1)
        
        return view('frontend.users.profile',compact('orders'));// compact('orders')
    }


    public function getAddonDetail($id){
        $addon = Addon::find($id);
        $addon->getMedia();
        return $addon;
    }

    public function checkOrder(Request $request){
        $order =  Order::where('user_id', Auth::user()->id)->where('addon_id', $request->addon)->first();
        if(!empty($order) && $order->status==1){
            return 1;
        }
        return 0;
    }

//    public function cart($id){
//        $addon =  Addon::find($id);
//        return view('frontend.carts.index', compact('addon'));
//    }
}
