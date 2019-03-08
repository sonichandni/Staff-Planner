<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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
    //update
    public function UpdateProject($id)
    {
        // $data = request('data');
        // $ins = json_decode(json_encode($data), true);
        $data = Project::find($id)->fill(Input::all());
        return response()->json([
            'code' => SUCCESS,
            'message' => 'User Access data inserted successfylly'
        ]);
        
    }
}
