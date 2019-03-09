<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    //add staff
    public function AddStaff()
    {
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        Staff::insert($ins);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Staff data inserted successfully'
        ]);
    }

    //get employee list
    public function getEmployeeList()
    {
        $list = Staff::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Employee list',
            'data' => $list
        ]);
    }
}
