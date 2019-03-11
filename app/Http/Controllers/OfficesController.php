<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficesController extends Controller
{
    //get Office list
    public function getOfficeList()
    {
        $list = Office::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Office list',
            'data' => $list
        ]);
    }

    //get project name list
    public function getOfficeNameList()
    {
        $data = Office::select('name')->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Office Data',
            'data' => $data
        ]);
    }
}
