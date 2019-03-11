<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use DB;

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

    //Get  employee details
    public function getEmployeeDetails($id)
    {
        $data =  DB::table('staff')->where('id', $id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'employeee data',
            'data' => $data
        ]);
    }

    //upload user profile
    public function uploadUserProfile(Request $request)
    {
        $id = $request->input('id');
        $data = Staff::find($id);
        if($request->hasFile('up_file'))
        {
            $filewithext = $request->file('up_file')->getClientOriginalName();
            $ext = $request->file('up_file')->getClientOriginalExtension();
            $fileToStrore = $filewithext;
            //$path = $request->file('up_file')->storeAs('public/posts_images',$fileToStrore);
            $data->photo = $fileToStrore;
        }
        $data->save();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'employeee data'
        ]);
    }
}
