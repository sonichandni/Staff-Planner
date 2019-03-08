<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccess;
use DB;
use App\User;

class UserAccessController extends Controller
{
    //Add User Access
    public function AddUserAccess()
    {
        $credentials = request(['user_id', 'office_id', 'region_id', 'devision_id']);

        $UserAccess = new UserAccess;
        $UserAccess->user_id = $credentials['user_id'];
        $UserAccess->office_id = $credentials['office_id'];
        $UserAccess->region_id =$credentials['region_id'];
        $UserAccess->devision_id = $credentials['devision_id'];

        if($UserAccess->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'User Access Added Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'User Access Added Unsuccessful'
            ]);
        }
        
    }

    //Delete User
    public function DeleteUserAccess()
    {
        $id = request('id');
        DB::table('user_accesses')->where('id', $id)->delete();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'User Access Deleted Successfully'
        ]);
        
    }

    //Update User
    public function UpdateUserAccess()
    {
        $credentials = request(['id', 'user_id', 'office_id', 'region_id', 'devision_id']);

        $UserAccess = UserAccess::find($credentials['id']);
        $UserAccess->user_id = $credentials['user_id'];
        $UserAccess->office_id = $credentials['office_id'];
        $UserAccess->region_id =$credentials['region_id'];
        $UserAccess->devision_id = $credentials['devision_id'];
        
        if($UserAccess->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'User Access Updated Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'User Access Updated Unsuccessful'
            ]);
        }
        
    }

    //Select Access Type
    public function GetUserAccess()
    {
        $id = request('id');
        $data = DB::table('user_accesses')->where('id', $id)->get();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'User Access Fached Successfully',
            'data' => $data
        ]);
        
    }

    
    //bulk data insert
    public function BulkAddUserAccess()
    {
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        UserAccess::insert($ins);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'User Access data inserted successfylly'
        ]);
        
    }
}
