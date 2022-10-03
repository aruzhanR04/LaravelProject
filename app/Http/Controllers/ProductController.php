<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use mysql_xdevapi\RowResult;

class ProductController extends Controller
{
    public function index(){
        $products = Products::with('category')->get();
        return view('products',['products'=>$products]);
    }
    public function create(){
        $categories = Category::all();
        return view('addProducts',[
            'categories' =>$categories
        ]);
    }

    public function store(Request $request){
        if($request->hasFile('image')){
            $product = new Products();
            $product->product_name = $request->get('product_name');
            $product->price = $request->get('price');
            $product->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $product->image = $url;

            $product->save();

            return redirect('/')->with('status','Saved');
        }
    }

    public function product(Products $product){
        return view('product',[
            'product'=>$product
        ]);
    }

    public function edit(Products $product){
        $categories = Category::all();
        return view('EditProduct',[
            'product'=>$product,
            'categories' => $categories
        ]);
        return redirect('/')->with('status','Edited');
    }

    public function editSave(Request $request, Products $product){
        if($request->hasFile('image')){
            $product->product_name = $request->get('product_name');
            $product->price = $request->get('price');
            $product->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $product->image = $url;

            $product->save();

            return redirect('/')->with('status','Saved');
        }
    }

    public function delete(Products $product){
        $product->delete();
        return redirect('/')->with('status','Deleted');
    }

    public function buy(Products $product){
        return view('buy',[
            'product'=>$product
        ]);
    }
}
