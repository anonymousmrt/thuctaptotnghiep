<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        $title = \Illuminate\Support\Facades\DB::table('categories')->select('name')->get()->toArray();
        dd($title);
    }
}
