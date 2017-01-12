<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getList(){
        $orders = Order::all();
        return view('admin.orders.list', compact('orders'));
    }
}
