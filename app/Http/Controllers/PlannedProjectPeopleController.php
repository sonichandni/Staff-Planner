<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlannedProjectPeople;

class PlannedProjectPeopleController extends Controller
{
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
}
