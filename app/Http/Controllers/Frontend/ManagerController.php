<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\User;
use Auth;

class ManagerController extends Controller
{
    public function profile(Request $request)
    {
    	$result = Leave::where(["user_id" => auth::user()->id])->get();
    	$attendance= Attendance::where(["user_id" => auth::user()->id])->get();
		$today= Attendance::where(["user_id" => auth::user()->id])->where(['created_at'=>date('Y-m-d')])->first();
		$data= Attendance::where(["user_id" => auth::user()->id])->where(['created_at'=>date('Y-m-d')])->where(['time_out'=> NULL])->first();
		$date = now();
		$Birthday= User::whereMonth('dob', '>', $date->month)->orWhereMonth('dob', '=', $date->month)->whereDay('dob', '>=', $date->day)->take(5)->orderByRaw('DATE_FORMAT(dob, "%m-%d")')->get();
    	return view('frontend.manager',compact('result','attendance','today','data','Birthday'));
    }
}
