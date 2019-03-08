<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Subscriber;

class GetSubscribers extends Controller
{
    public function GetSubscribers()
    {
        $subscribers = DB::table('subscribers')->get();
        return response()->json($subscribers);
    }
    public function AddSubscribers()
    {
        $credentials = request(['company_id', 'domain_id', 'created_by']);
        $subscriber = new Subscriber;
        $subscriber->company_id = $credentials['company_id'];
        $subscriber->domain_id = $credentials['domain_id'];
        $subscriber->created_by = $credentials['created_by'];
        $subscriber->save();
        return response()->json([
            'message' => 'Subscriber Added Successfully'
        ]);
        
    }
}
