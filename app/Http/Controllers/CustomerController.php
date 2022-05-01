<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;

class CustomerController extends Controller
{

    public function index(){
        $customers = Customer::all();
        return ['data' => $customers];
        
    }

    public function show($id){
        $customers = Customer::find($id);
        return ['data' => $customers];
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $customerData = $request;
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'mobile_number' => 'required',
                'address' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($customerData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $customers = new Customer;
            $customers->first_name =  $customerData->first_name;
            $customers->last_name =  $customerData->last_name;
            $customers->email_address =  $customerData->email_address;
            $customers->mobile_number =  $customerData->mobile_number;
            $customers->address =  $customerData->address;
            $customers->status =  $customerData->status;
            
            $customers->save();
            return response()->json([
                'data' => [
                    'message' => 'New Customer created',
                    'data' => $customers
                ]
            ], 201);
        }
    }

    public function update($id, Request $request){
        if($request->IsMethod('put')){
            $customerData = $request;
            
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'mobile_number' => 'required',
                'address' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($customerData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $customers = Customer::find($id);
            $customers->first_name =  $customerData->first_name;
            $customers->last_name =  $customerData->last_name;
            $customers->email_address =  $customerData->email_address;
            $customers->mobile_number =  $customerData->mobile_number;
            $customers->address =  $customerData->address;
            $customers->status =  $customerData->status;
            
            $customers->save();
            return response()->json([
                'data' => [
                    'message' => 'Customer successfully updated',
                    'data' => $customers
                ]
            ], 201);
            
        }
    }

}
