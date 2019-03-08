<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GetTableList extends Controller
{
    public function GetTableList()
    {
        $tables = DB::select('SHOW TABLES');
        return response()->json($tables);
        
    }
}
