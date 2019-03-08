<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class GetFieldsList extends Controller
{
    public function GetFieldsList()
    {
        $table = request('table');
        $columns = Schema::getColumnListing($table); 
        return response()->json($columns);
    }
}
