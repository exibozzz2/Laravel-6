<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function getAllOrders()
    {
        return view('orders', [
            'orders' => Session::get('order')
        ]);

    }
    public function createOrder(Request $request)
    {

        Session::push('order', [
            'productId' => $request->get('productId'),
            'productName' => $request->get('productName'),
            'productAmount' => $request->get('productAmount'),
        ]);
        return redirect()->route('orders.all');
    }
}
