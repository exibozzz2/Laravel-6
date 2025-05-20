<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
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


    public function addProduct(AddProductRequest $request) {

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

    public function update(AddProductRequest $request, ProductsModel $product) {


        $this->connectRepo->editProduct($product, $request);

        return redirect('/all-products');

    }


}
