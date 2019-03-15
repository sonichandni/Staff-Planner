<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //Add User
    public function AddUser()
    {
        $credentials = request(['name', 'email', 'password']);

        $user = new User;
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        
        if($user->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'User Registered Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'User Registered Unsuccessful'
            ]);
        }
        
    }

    //Delete User
    public function DeleteUser()
    {
        $id = request('id');
        DB::table('users')->where('id', $id)->delete();

        return response()->json([
            'code' => SUCCESS,
            'message' => 'User Deleted Successfully'
        ]);
        
    }

    //Update User
    public function UpdateUser()
    {
        $credentials = request(['name', 'password', 'id']);

        $user = User::find($credentials['id']);
        $user->name = $credentials['name'];
        $user->password = Hash::make($credentials['password']);
        
        if($user->save())
        {
            return response()->json([
                'code' => SUCCESS,
                'message' => 'User Updated Successfully'
            ]);
        }
        else {
            return response()->json([
                'code' => INTERNAL_FAIL,
                'message' => 'User Updated Unsuccessful'
            ]);
        }
        
    }

}
