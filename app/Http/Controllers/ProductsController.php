<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function getAllProducts() {
        $allProducts = ProductsModel::all();
        return view('allProducts', compact('allProducts'));
    }


    public function addProduct(Request $request) {

        $request->validate([
            'name' => 'string|required|min:4',
            'description' => 'string|required|min:10|max:256',
            'price' => 'integer|required',
            'amount' => 'integer|required',
        ]);

        ProductsModel::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
        ]);

        return redirect('/add-product');
    }


    public function delete($product) {

        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if($singleProduct === null) {
            die ("Product doesn't exist");
        }

        $singleProduct->delete();

        return redirect()->back();

    }
}
