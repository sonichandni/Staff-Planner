<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
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
