<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leave;
use Auth;

class UserController extends Controller
{
   public function profile(Request $request)
	{
		$result = Leave::where(["user_id" => auth::user()->id])->get();
		$attendance= Attendance::where(["user_id" => auth::user()->id])->get();
		$today= Attendance::where(["user_id" => auth::user()->id])->where(['created_at'=>date('Y-m-d')])->first();
    	return view('index',compact('result','attendance','today'));
	}
}