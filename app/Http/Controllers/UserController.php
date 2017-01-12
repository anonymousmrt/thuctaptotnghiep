<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function getList(){
    	$users = User::all();
    	return view('admin.users.list',compact('users'));
    }

    public function getProfile()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', 1)->get();
    	return view('frontend.users.profile', compact('orders'));
    }

    public function uploadAvatar(Request $request){
        $avatar =User::find(Auth::user()->id);
        if($request->hasFile('avatar')){
            if($avatar->getMedia()== null){
                $avatar->addMedia($request->avatar)->toMediaLibrary();
            }else{
                $avatar->clearMediaCollection();
                $avatar->addMedia($request->avatar)->toMediaLibrary();
            }
        }
        return Redirect::to('admin/user/profile');
    }
}
