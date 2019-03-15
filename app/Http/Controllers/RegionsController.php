<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use DB;

class RegionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function getRegion($name)
    {
        $data = DB::table('regions')->where('name',$name)->get();
        
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Region data',
            'data' => $data
        ]);
        
    }
}
