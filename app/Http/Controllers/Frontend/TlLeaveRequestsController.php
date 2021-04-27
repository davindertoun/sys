<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class TlLeaveRequestsController extends Controller
{
	public function accept_tl_leave(Request $request)
   {
   	 	$LeaveId = decrypt($request->id);
        $data = Leave::find($LeaveId);
        $data->state_id = 2;
        $data->save();
        return redirect('tl_leave_request');
   }
  	public function reject_tl_leave(Request $req)
	  {
	  		$LeaveId = decrypt($req->id);
	        $data = Leave::find($LeaveId);
	        $data->state_id = 3;
	        $data->save();
	        return redirect('tl_leave_request');
	  }
}
