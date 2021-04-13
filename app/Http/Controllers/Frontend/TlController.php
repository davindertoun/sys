<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Leave;
use Auth;

class TlController extends Controller
{
    public function profile(Request $request)
    {
    	$result = Leave::where(["user_id" => auth::user()->id])->get();
    	return view('frontend.tl_dashboard',compact('result'));
    }
}
