<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class EmployeeDataController extends Controller
{
    public function employee_data()
    {
    	$Attendance = Attendance::all();
    	return view('frontend.employee_data',compact('Attendance'));
    }
    public function edit_attendance(Request $request)
    {
    	$Id = decrypt($request->id);
    	$data = Attendance::find($Id);
    	$user = User::All();
    	return view('frontend.edit_attendance',compact('data','user'));
    }
    public function employee_attendance(Request $req)
    {
    	$id = $req->input('id');
    	$data = Attendance::where(['id'=> $id])->first();
    	$data->time_in = $req->input('time_in');
    	$data->time_out = $req->input('time_out');
    	$data->working_hours = $req->input('working_hours');
    	$data->attendance_status = $req->input('status');
    	$data->reason = $req->input('reason');
    	$data->save();
    	return redirect('employee_data');
    }
}
