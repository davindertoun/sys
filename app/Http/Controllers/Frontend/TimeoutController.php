<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance; 
class TimeoutController extends Controller
{
    public function time_out(Request $request)
    {
		  $data = Attendance::findOrfail($request->user_id);	 
		 $data->time_out = $request->timeout; 
		  $data->updated_at = $request->newdt;
         $data->save();
   		return redirect()->back()->with(['success'=>'Form submit Successfully']);
    }
}
