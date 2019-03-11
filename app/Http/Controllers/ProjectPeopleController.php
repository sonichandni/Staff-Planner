<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectPeople;
use Illuminate\Support\Facades\Input;
use DB;

class ProjectPeopleController extends Controller
{
    //get Project People
    public function getProjectPeopleList()
    {
        $list = ProjectPeople::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Project people list data',
            'data' => $list
        ]);
    }

    //Add Project People
    public function AddProjectPeople()
    {
        $data = Input::all();
       // $ins = json_decode(json_encode($data), true);
        ProjectPeople::insert($data);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data inserted successfully'
        ]);
    }

    //Delete Project People
    public function DeleteProjectPeople($id)
    {
        ProjectPeople::find($id)->delete();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data deleted successfully'
        ]);
    }

    //Get Project People
    public function GetProjectPeople($id)
    {
        $data =  DB::table('project_peoples')->where('project_id', $id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data',
            'data' => $data
        ]);
    }

    //Get Project People
    public function getPeopleProject($id)
    {
        $data =  DB::table('project_peoples')->where('staff_id', $id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'People Project data',
            'data' => $data
        ]);
    }

    //Delete Project People with condition
    public function DeleteProjectPeople1()
    {
        $staff_id = request('staff_id');
        $project_id = request('project_id');
        DB::table('project_peoples')->where([
            ['staff_id', $staff_id],
            ['project_id', $project_id],
        ])->delete();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data deleted successfully'
        ]);
    }

    //update Project People
    public function updateProjectPeople($id)
    {
        $data = $data = Input::except('_token');
        $q = ProjectPeople::where('id',$id)->update($data);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data update successfully'
        ]);
    }

    //bulk data insert
    public function bulkAddProjectPeople()
    {
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        ProjectPeople::insert($ins);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Project People data inserted successfylly'
        ]);
        
    }


}
