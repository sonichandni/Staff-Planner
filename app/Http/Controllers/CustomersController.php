<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    //get Customer list
    public function getCustomerList()
    {
        $list = Customer::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Customer list',
            'data' => $list
        ]);
    }
}
