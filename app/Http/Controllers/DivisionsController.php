<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionsController extends Controller
{
    //get Division list
    public function getDivisionList()
    {
        $list = Division::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Division list',
            'data' => $list
        ]);
    }
}
