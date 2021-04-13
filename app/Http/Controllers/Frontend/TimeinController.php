<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance; 

class TimeinController extends Controller
{
    public function time_in(Request $request)
    {
    	$data = new Attendance([
            'user_id' => $request->id,
            'time_in' => $request->timein,
            'type_id'=> 0,
            'created_at'=> $request->newDate,
        ]);
        $data->save();
        return redirect()->back()->with(['success'=>'Data Submitted']);
    }
}
