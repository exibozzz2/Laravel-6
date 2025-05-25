<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function createOrder($request)
    {
        Session::push('order',
        [
            'name' => $request->productName,
            'product_id' => $request->productId,
            'amount' => $request->productAmount,
        ]);
    }
}
