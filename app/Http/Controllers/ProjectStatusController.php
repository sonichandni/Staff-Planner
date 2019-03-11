<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectStatus;
use DB;

class ProjectStatusController extends Controller
{
    //get project status list
    public function getProjectStatus($status)
    {
        $data = DB::table('project_statuses')->where('name',$status)->get();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Project Status list',
            'data' => $data
        ]);
    }
}
