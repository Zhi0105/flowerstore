<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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


        $customers = new Customer();
        $customers->first_name = $request->input('first_name');
        $customers->last_name = $request->input('last_name');
        $customers->email_address = $request->input('email_address');
        $customers->mobile_number = $request->input('mobile_number');
        $customers->address = $request->input('address');
        $customers->status = $request->input('status');

        $customers->save();
        return response()->json($customers);
    }
}
