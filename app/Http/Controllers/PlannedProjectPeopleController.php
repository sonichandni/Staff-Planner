<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlannedProjectPeople;
use DB;

class PlannedProjectPeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //get Planned Project People
    public function getPlannedProjectPeople()
    {
        $list = PlannedProjectPeople::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Planned Project People list',
            'data' => $list
        ]);
    }

    //Get Planned Project People Search
    public function getPlannedProjectPeopleSearch($id)
    {
        $data =  DB::table('planned_project_people')->where('id', $id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Planned People Project data',
            'data' => $data
        ]);
    }
}
