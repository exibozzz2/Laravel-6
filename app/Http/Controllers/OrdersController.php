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

        $ordersFromSession = Session::get('order');

        if(count($ordersFromSession) < 1 )
        {
            return redirect()->route('product.all');
        }

        $allOrders = [];

        foreach ($ordersFromSession as $singleOrder)
        {
            $orderedProduct = ProductsModel::firstWhere(['id' => $singleOrder['productId']]);

            if($orderedProduct)
            {
                $allOrders[] = [
                    'productName' => $orderedProduct->name,
                    'productId' => $orderedProduct->id,
                    'productPrice' => $orderedProduct->price,
                    'productStock' => $orderedProduct->amount,
                    'productAmount' => $singleOrder['productAmount'],
                    'productTotal' => $orderedProduct->price*$singleOrder['productAmount'],
                ];
            }
        }

        return view('orders', [
            'allOrders' => $allOrders,
        ]);

    }


    public function createOrder(OrdersRequest $request)
    {

        $orderedProduct = ProductsModel::where(['id' => $request->productId])->first();

        if($orderedProduct->amount < $request->productAmount){

            return redirect()->back()
                ->with('error', 'We are sorry, but the quantity you have requested exceeds
                                   our current stock availability. Please adjust the order
                                   quantity or contact our customer support for assistance.
                                   We strive to maintain accurate inventory levels and apologize
                                   for any inconvenience caused.');
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
