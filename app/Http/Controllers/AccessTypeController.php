<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccessType;
use DB;

class AccessTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //Add Access Type
    public function AddAccessType()
    {
        $type = request('type');

        $AccessType = new AccessType;
        $AccessType->type = $type;
        
        if($AccessType->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'Access Type Added Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'Access Type Adding Unsuccessful'
            ]);
        }
        
    }

    //Delete Access Type
    public function DeleteAccessType()
    {
        $id = request('id');
        DB::table('access_types')->where('id', $id)->delete();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'Access Type Deleted Successfully'
        ]);
        
    }

    //Update Access Type
    public function UpdateAccessType()
    {
        $credentials = request(['type', 'id']);

        $AccessType = AccessType::find($credentials['id']);
        $AccessType->type = $credentials['type'];
                
        if($AccessType->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'Access Type Updated Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'Acces Type Update not successful'
            ]);
        }
        
    }

    //Select Access Type
    public function GetAccessType()
    {
        $id = request('id');
        $data = DB::table('access_types')->where('id', $id)->get();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'Access Type Fached Successfully',
            'data' => $data
        ]);
        
    }

    //Select All Access Type
    public function GetAllAccessType()
    {
        $data = DB::table('access_types')->get();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'Access Types Fached Successfully',
            'data' => $data
        ]);
        
    }
}
