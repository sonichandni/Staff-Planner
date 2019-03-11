<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffStatus;

class StaffStatusesController extends Controller
{
    //get Staff Status
    public function getStaffStatus()
    {
        $list = StaffStatus::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Staff Status list',
            'data' => $list
        ]);
    }
}
