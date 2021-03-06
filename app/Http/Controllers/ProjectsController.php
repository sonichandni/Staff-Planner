<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use Illuminate\Support\Facades\Input;
class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //data insert
    public function AddProject()
    {
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        Project::insert($ins);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project data inserted successfully'
        ]);
    }
    //update Project
    public function UpdateProject($id)
    {
        $data = $data = Input::except('_token');
        $q = Project::where('id',$id)->update($data);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project data update successfully'
        ]);
    }

    //Search Project
    public function SearchProject($p)
    {   
        $data = DB::table('projects')->where('name', $p)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project Data',
            'data' => $data
        ]);
    }

    //Project List
    public function GetProjectList()
    {
        $data = Project::all();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project data list',
            'data' => $data
        ]);
        
    }

    //get project name list
    public function getProjectNameList()
    {
        $data = Project::select('name')->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project Data',
            'data' => $data
        ]);
    }
}
