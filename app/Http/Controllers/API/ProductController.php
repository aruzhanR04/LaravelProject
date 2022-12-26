<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Products;
use App\Services\ProductService;
use Illuminate\Http\Request;
use PharIo\Manifest\ElementCollectionException;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService =$productService;
    }

    public function index(){
        try {
            $products = $this->productService->getAll();

            return response()->json([
                'status' => true,
                'products' =>ProductResource::collection($products)
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function store(Request $request){
        try {
            $products = $this->productService->addProduct($request);
            return response()->json([
                'status' => true,
                'products' => $products
            ],200);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit(Products $products, Request $request){
        try {
            $project = $this->productService->editProduct($products, $request);
            return response()->json([
                'status' => true,
                'product' => $products
            ],200);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request){
        try {
            $id = $request->id;
            $product = $this->productService->deleteProduct($id);
            return response()->json([
                'status' => true,
                'product' => $product
            ],200);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

}
