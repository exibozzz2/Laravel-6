<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $connectRepo;

    public function __construct()
    {
        $this->connectRepo = new ProductRepository();
    }

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

       $this->connectRepo->createProduct($request);

        return redirect('/add-product');
    }


    public function delete($product) {

        $singleProduct = $this->connectRepo->singleProduct($product);

        if($singleProduct === null) {
            die("Product not found");
        }

        $singleProduct->delete();

        return redirect('/all-products');


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
