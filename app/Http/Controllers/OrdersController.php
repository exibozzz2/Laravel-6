<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function getAllOrders()
    {

        $allOrdersIds = [];

        foreach(Session::get('order') as $singleOrder)
        {
            $allOrdersIds[] = $singleOrder['productId'];
        }

        $allOrders = ProductsModel::whereIn("id", $allOrdersIds)->get();


        return view('orders', [
            'ordersFromSession' => Session::get('order'),
            'allOrders' => $allOrders,

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
