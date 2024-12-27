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
            'price' => 'int|required',
            'amount' => 'int|required',
        ]);

        ProductsModel::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
        ]);

        return redirect('/add-product');
    }


    public function delete(ProductsModel $product) {

        $product->delete();
        return redirect()->back();

    }

    public function viewSingleProduct(ProductsModel $product) {

        return view ('editProduct', compact('product'));

    }

    public function update(Request $request, ProductsModel $product) {

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->amount = $request->get('amount');
        $product->save();

        return redirect('/all-products');

    }


}
