<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTypes;
use DB;

class ProjectTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function getProjectType($type)
    {
        $data = DB::table('project_types')->where('name',$type)->get();
        
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project Type data',
            'data' => $data
        ]);
    }

    //get project type head
    public function getProjectTypehead($type)
    {
        $data = ProjectTypes::select('name')->where('name', 'like', "%{$type}%")->get();
        $array = [];
        foreach($data as $k => $v) {
            $array[] = $v['name'];
        }
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project Type search data',
            'data' => $array
        ]);
    }
}
