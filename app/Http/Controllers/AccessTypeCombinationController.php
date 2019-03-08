<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessTypeCombination;
use DB;

class AccessTypeCombinationController extends Controller
{
        //Add Access Type Combination
        public function AddAccessTypeCombination()
        {
            $Combination = request('combination');
    
            $AccessTypeCombination = new AccessTypeCombination;
            $AccessTypeCombination->combination = $Combination;
            
            if($AccessTypeCombination->save())
            {
                return response()->json([
                    'code' => SUCCESS,
                    'message' => 'Access Type Combination Added Successfully'
                ]);
            }
            else {
                return response()->json([
                    'code' => INTERNAL_FAIL,
                    'message' => 'Access Type Combination Adding Unsuccessful'
                ]);
            }
            
        }
    
        //Delete Access Type Combination
        public function DeleteAccessTypeCombination()
        {
            $id = request('id');
            DB::table('accesstype_combinations')->where('id', $id)->delete();
    
            return response()->json([
                'code' => SUCCESS,
                'message' => 'Access Type Combination Deleted Successfully'
            ]);
            
        }
    
        //Update Access Type Combination
        public function UpdateAccessTypeCombination()
        {
            $credentials = request(['combination', 'id']);
    
            $AccessTypeCombination = AccessTypeCombination::find($credentials['id']);
            $AccessTypeCombination->combination = $credentials['combination'];
                    
            if($AccessTypeCombination->save())
            {
                return response()->json([
                    'code' => SUCCESS,
                    'message' => 'Access Type Combination Updated Successfully'
                ]);
            }
            else {
                return response()->json([
                    'code' => INTERNAL_FAIL,
                    'message' => 'Acces Type Combination Update not successful'
                ]);
            }
            
        }
    
        //Select Access Type Combination
        public function GetAccessTypeCombination()
        {
            $id = request('id');
            $data = DB::table('accesstype_combinations')->where('id', $id)->get();
    
            return response()->json([
                'code' => SUCCESS,
                'message' => 'Access Type Combination Fached Successfully',
                'data' => $data
            ]);
            
        }
    
        //Select All Access Type Combination
        public function GetAllAccessTypeCombination()
        {
            $data = DB::table('accesstype_combinations')->get();
    
            return response()->json([
                'code' => SUCCESS,
                'message' => 'Access Types Combinations Fached Successfully',
                'data' => $data
            ]);
            
        }
}
