<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Validator;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return [
            'data' => $orders
        ];
    }
    
    public function show($id){
        $orders = Order::find($id);
        return ['data' => $orders];
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $ordersData = $request;
            $rules = [
                'product_id' => 'required',
                'customer_id' => 'required',
                'price' => 'required',
            ];
            $validator = Validator::make($ordersData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $orders = new Order;
            $orders->product_id =  $ordersData->product_id;
            $orders->customer_id =  $ordersData->customer_id;
            $orders->price =  $ordersData->price;
            
            $orders->save();
            return response()->json([
                'data' => [
                    'message' => 'New Order created',
                    'data' => $orders
                ]
            ], 201);
        }
    }

    
    public function update($id, Request $request){
        if($request->IsMethod('put')){
            $ordersData = $request;
            $rules = [
                'product_id' => 'required',
                'customer_id' => 'required',
                'price' => 'required',
            ];
            $validator = Validator::make($ordersData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $orders = Order::find($id);
            $orders->product_id =  $ordersData->product_id;
            $orders->customer_id =  $ordersData->customer_id;
            $orders->price =  $ordersData->price;
            
            $orders->save();
            return response()->json([
                'data' => [
                    'message' => 'Order successfully updated',
                    'data' => $orders
                ]
            ], 201);
            
        }
    }
}
