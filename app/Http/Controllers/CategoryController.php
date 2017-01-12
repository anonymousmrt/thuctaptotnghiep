<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
   public function getAdd(){
       return view('admin.categories.add');
   }

    public function postAdd(Request $request){
        $category =  new Category();

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return Redirect::to('admin/category/list');
    }

    public function getList(){
        $categories =  Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    // sua

    public function getEdit($id){
        $category = Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
    }
    
    public function postEdit(Request $request,$id){
        $category = Category::find($id);
  
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return Redirect::to('admin/category/list');

    }
    Public function getEditStt(Request $request){
        
        $category= Category::find($request->id);
        $category->status = $request->value;
        $category->save();
     
    }
    
    public function getDelete(Request $request){

        $category = Category::find($request->id);
        $category->delete();
        return response()->json();
    }
    

    
}
