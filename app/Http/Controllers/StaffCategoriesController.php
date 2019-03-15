<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\StaffCategory;

class StaffCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    //get Staff Categoty
    public function getStaffCategory()
    {
        $list = StaffCategory::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Staff Category list',
            'data' => $list
        ]);
    }
}
