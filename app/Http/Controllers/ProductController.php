<?php

namespace App\Http\Controllers;

use App\Media;
use App\Product;
use App\ProductMedia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function getAdd(){
        return view('admin.products.add');
    }

    public function postAdd(Request $request){
        $product =  new Product();
        $product->name = $request->name;
        $product->feature = $request->feature;
        $product->description = htmlentities($request->description, ENT_QUOTES);
        $product->category_id =$request->category;
        $product->status =$request->status;
        $product->save();
        if($request->hasFile('file')){
            foreach($request->file as $image){
                $product->addMedia($image)->toMediaLibrary();
            }
        }
        return Redirect::to('admin/product/list');
    }

    public function getList(){
        $products =  Product::select('*')->orderBy('id', 'DESC')->get();
        return view('admin.products.list', compact('products'));
    }

    public function getDetail($id){
        $product = Product::findOrFail($id);
        return view('admin.products.detail', compact('product'));
    }

    public function getEdit($id){
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function postEdit(Request $request, $id){
        $update_product = Product::where('id', $id)->update([
            'name'=>$request->name,
            'feature'=>$request->feature,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category,
        ]);
        if($update_product ==1){
            if($request->hasFile('file')){
                $add_product =  Product::findOrFail($id);
                foreach($request->file as $image){
                    $add_product->addMedia($image)->toMediaLibrary();
                }
            }
        }
        return Redirect::to('admin/product/list');
    }

    public function delete(Request $request){
        $delete_product = Product::find($request->id);
        $delete_product->delete();
        return response()->json();
    }

    public function deleteImage(Request $request){
        Media::findOrFail($request->id)->delete();
        return response()->json();
    }

    public function editStatus(Request $request, $id){
        Product::where('id', $id)->update(['status'=>$request->status]);
        return response()->json();
    }

}
