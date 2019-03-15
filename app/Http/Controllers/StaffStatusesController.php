<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffStatus;

class StaffStatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
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
