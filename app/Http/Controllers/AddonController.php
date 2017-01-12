<?php

namespace App\Http\Controllers;

use App\Addon;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
class AddonController extends Controller
{
    public function getAdd(){
        $products =  Product::all();
        return view('admin.addons.add', compact('products'));
    }

    public function postAdd(Request $request){
        $addon = new Addon();

        $addon->name = $request->name;
        $addon->price = $request->price;
        $addon->feature = $request->feature;
        $addon->description = $request->description;
        $addon->status = $request->status;
        $addon->product_id = $request->product;
        $addon->save();
        if($addon->save()){
            if($request->hasFile('file')){
                foreach($request->file as $image){
                    $addon->addMedia($image)->toMediaLibrary();
                }
            }

            if($request->hasFile('download')){
                $addon->addMedia($request->download)->toCollectionOnDisk('downloads');
            }
        }
        return Redirect::to('admin/addon/list');
    }


    public function getList(){
        $addons = Addon::select('*')->orderBy('id', 'DESC')->get();
        return view('admin.addons.list', compact('addons'));
    }


    public function getEdit($id){
        $addon = Addon::findOrFail($id);
        return view('admin.addons.edit', compact('addon'));
    }

    public function postEdit(Request $request, $id){
        $update_addon = Addon::where('id', $id)->update([
            'name'      =>$request->name,
            'price'     =>$request->price,
            'feature'   =>$request->feature,
            'description'=>$request->description,
            'status'    =>$request->status,
            'product_id'=>$request->product,
        ]);
        if($update_addon ==1){
            if($request->hasFile('file')){
                $add_media =  Addon::findOrFail($id);
                foreach($request->file as $image){
                    $add_media->addMedia($image)->toMediaLibrary();
                }
            }
        }
        return Redirect::to('admin/addon/list');
    }

    public function editStatus(Request $request,$id){
        $status = Addon::find($id);
        $status->status = $request->status;
        $status->save();
        return response()->json();
    }
}
