<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use Illuminate\Support\Facades\Input;
class ProjectsController extends Controller
{
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
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        $q = Project::find($id)->fill(Input::all());
        //$q = Input::all();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project data update successfylly'
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
}
