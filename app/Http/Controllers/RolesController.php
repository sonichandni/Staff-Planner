<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //Select all Roles
    public function GetAllRoles()
    {
        $roles = DB::table('roles')->get();
        return response()->json($roles);
    }

    //Select one role
    public function GetRole()
    {
        $id = request('id');
        $role = DB::table('roles')->where('id',$id)->get();
        return response()->json($role);
    }

    //Add Role
    public function AddRole()
    {
         
        $role = new Role;
        $role->role = request('role');
        
        $role->save();
        return response()->json([
            'message' => 'Role Added Successfully'
        ]);
        
    }

    //Delete Role
    public function DeleteRole()
    {
        $id = request('id');
        DB::table('roles')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Role Deleted Successfully'
        ]);
        
    }

    //Update Role
    public function UpdateRole()
    {
        $role = request('role');
        $id = request('id');
        DB::table('roles')->where('id', $id)->update(['role' => $role]);
        
        return response()->json([
            'message' => 'Role Updated Successfully'
        ]);
    }
}
