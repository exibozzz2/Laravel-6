<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
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


    public function createOrder(OrdersRequest $request)
    {
        Session::push('order', [
            'productName' => $request->get('productName'),
            'productId' => $request->get('productId'),
            'productPrice' => $request->get('productPrice'),
            'productAmount' => $request->get('productAmount'),
        ]);
        return redirect()->route('orders.all');
    }
}
