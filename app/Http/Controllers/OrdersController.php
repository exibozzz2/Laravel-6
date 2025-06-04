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

        $orderedProduct = ProductsModel::where(['id' => $request->productId])->first();

        if($orderedProduct->amount < $request->productAmount){
            die("We're sorry, but the quantity you've requested exceeds
            our current stock availability. Please adjust the order
            quantity or contact our customer support for assistance.
            We strive to maintain accurate inventory levels and apologize
            for any inconvenience caused.");
        }

        Session::push('order', [
            'productName' => $request->get('productName'),
            'productId' => $request->get('productId'),
            'productPrice' => $request->get('productPrice'),
            'productAmount' => $request->get('productAmount'),
        ]);
        return redirect()->route('orders.all');
    }
}
