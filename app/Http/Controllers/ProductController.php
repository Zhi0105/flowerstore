<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
        $products = new Product();
        $products->product_name = $request->input('product_name');
        $products->product_description = $request->input('product_description');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');
        $products->status = $request->input('status');

        $products->save();
        return response()->json($products);
    }
}
