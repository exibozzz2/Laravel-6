<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepository
{

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function createProduct($request)
    {
        $this->productModel->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
        ]);
    }

    public function singleProduct($id){
        return $this->productModel->where(['id' => $id])->first();
    }


    public function editProduct($product, $request){

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->amount = $request->get('amount');
        $product->save();
    }
}
?>
