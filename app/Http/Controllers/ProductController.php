<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return ['data' => $product];
    }

    public function show($id){
        $product = Product::find($id);
        return ['data' => $product];
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $productData = $request;
            $rules = [
                'product_name' => 'required',
                'product_description' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($productData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $products = new Product;
            $products->product_name =  $productData->product_name;
            $products->product_description =  $productData->product_description;
            $products->quantity =  $productData->quantity;
            $products->price =  $productData->price;
            $products->status =  $productData->status;
            
            $products->save();
            return response()->json([
                'data' => [
                    'message' => 'New Product created',
                    'data' => $products
                ]
            ], 201);
        }
    }

    public function update($id, Request $request){
        if($request->IsMethod('put')){
            $productData = $request;
            $rules = [
                'product_name' => 'required',
                'product_description' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($productData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $products =  Product::find($id);
            $products->product_name =  $productData->product_name;
            $products->product_description =  $productData->product_description;
            $products->quantity =  $productData->quantity;
            $products->price =  $productData->price;
            $products->status =  $productData->status;
            
            $products->save();
            return response()->json([
                'data' => [
                    'message' => 'Product successfully updated',
                    'data' => $products
                ]
            ], 201);
        }
    }
}
