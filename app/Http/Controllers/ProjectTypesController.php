<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;
use DB;

class ProjectTypesController extends Controller
{
    public function getProjectType($type)
    {
        $data = DB::table('project_types')->where('name',$type)->get();
        
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project Type data',
            'data' => $data
        ]);
        
    }
}
