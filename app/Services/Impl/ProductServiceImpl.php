<?php

namespace App\Services\Impl;

use App\Models\Image;
use App\Models\Products;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{

    public function getAll(){
        $products = Products::all();

        if ($products == null){
            throw new \Exception('No data!', 404);
        }
        return $products;
    }

    public function createNew($request)
    {
        $product = new Products();
        $product->name = $request->get('name');
        $product->category_id = $request->get('category_id');
        $product->price = $request->get('price');
        $url = $request->file('image')->store('images');
        $product->image = $url;


        $product->save();

        if ($product == null){
            throw new \Exception('Cannot create!', 404);
        }

        return $product;
    }

    public function updateProd($request, $id)
    {
        $product = Products::find($id);

        if ($product == null){
            throw new \Exception('Not found!', 404);
        }


        $product->name = $request->get('name');
        $product->category_id = $request->get('category_id');
        $product->price = $request->get('price');
        $url = $request->file('image')->store('images');
        $product->image = $url;

        $product->save();

        return $product;
    }

    public function getById($request, $id)
    {
        $product = Products::find($id);

        if ($product == null){
            throw new \Exception('not found!', 404);
        }

        return $product;

    }

    public function deleteProd($request, $id)
    {
        $product = Products::find($id);

        if ($product == null){
            throw new \Exception('Product not found!', 404);
        }

        $product->delete();

        return true;

    }
}
