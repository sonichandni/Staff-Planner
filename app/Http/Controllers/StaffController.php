<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use DB;
use Illuminate\Support\Facades\Input;

class StaffController extends Controller
{
    //add staff
    public function AddStaff()
    {
        $data = request('data');
        $ins = json_decode(json_encode($data), true);
        Staff::insert($ins);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Staff data inserted successfully'
        ]);
    }

    //get employee list
    public function getEmployeeList()
    {
        $list = Staff::all();
        return response()->json([
            'code' => SUCCESS,
            'messsage' => 'Employee list',
            'data' => $list
        ]);
    }

    //Get  employee details
    public function getEmployeeDetails($id)
    {
        $data =  DB::table('staff')->where('id', $id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'employeee data',
            'data' => $data
        ]);
    }

    //upload user profile
    public function uploadUserProfile(Request $request)
    {
        $id = $request->input('id');
        $data = Staff::find($id);
        if($request->hasFile('up_file'))
        {
            $filewithext = $request->file('up_file')->getClientOriginalName();
            $ext = $request->file('up_file')->getClientOriginalExtension();
            $fileToStrore = $filewithext;
            //$path = $request->file('up_file')->storeAs('public/posts_images',$fileToStrore);
            $data->photo = $fileToStrore;
        }
        $data->save();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'employeee data'
        ]);
    }

    //update staff
    public function updateStaff($id)
    {
        $data = $data = Input::except('_token');
        $q = Staff::where('id',$id)->update($data);
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Staff data update successfully'
        ]);
    }

    //get sparkline
    public function getSparkline($id)
    {
        $data = DB::table('projects')
                    ->selectRaw('project_peoples.project_id,
                            project_peoples.end_date,
                            project_peoples.start_date,
                            projects.name,
                            allocation,
                            MONTH(projects.start_date) AS start_month,
                            MONTH(projects.end_date) AS end_month,
                            YEAR(projects.start_date) AS start_year,
                            YEAR(projects.end_date) AS end_year,
                            DAY(projects.start_date) AS startDate,
                            DAY(projects.end_date) AS endDate')
                    ->join('project_peoples','project_peoples.project_id' ,'=', 'projects.id')
                    ->where('staff_id',$id)->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Sparkline For one Employee',
            'data' => $data
        ]);
    }

    //get Sparkline For All Employee
    public function getSparklineForAllEmployee()
    {
        $data = DB::table('projects')
                    ->selectRaw('project_peoples.project_id,
                            project_peoples.end_date,
                            project_peoples.start_date,
                            projects.name,
                            allocation,
                            MONTH(projects.start_date) AS start_month,
                            MONTH(projects.end_date) AS end_month,
                            YEAR(projects.start_date) AS start_year,
                            YEAR(projects.end_date) AS end_year,
                            DAY(projects.start_date) AS startDate,
                            DAY(projects.end_date) AS endDate')
                    ->join('project_peoples','project_peoples.project_id' ,'=', 'projects.id')
                    ->get();
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Sparkline For All Employee',
            'data' => $data
        ]);
    }

    //get employee type head
    public function getEmployeeTypehead($type)
    {
        $data = Staff::select('first_name','middle_name','last_name')
                        ->where('first_name', 'like', "%{$type}%")
                        ->orWhere('middle_name', 'like', "%{$type}%")
                        ->orWhere('last_name', 'like', "%{$type}%")
                        ->get();
        $array = [];
        foreach($data as $k => $v) {
            $array[] = $v['first_name']." ".$v['middle_name']." ".$v['last_name'];
        }
        return response()->json([
            'code' => SUCCESS,
            'message' => 'Employee Type search data',
            'data' => $array
        ]);
    }
}
