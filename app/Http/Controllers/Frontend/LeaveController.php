<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function leave(Request $request)
    {
    	 $data = new Leave([
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'reason' => $request->get('description'),
            'user_id'=>$request->get('user_id'),
        ]);
         $data->save();
   		return redirect()->back()->with(['success'=>'Form submit Successfully']);
    }
}
