<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance; 
use Auth;
class TimeinController extends Controller
{
    public function time_in(Request $request)
    {
    	$data = new Attendance([
            'user_id' => $request->id,
            'time_in' => $request->timein,
            'state_id'=> 0,
            'created_at'=> $request->newDate,
        ]);
        $data->save();
        $result = Attendance::where(["user_id" => auth::user()->id])->get();
        $html='';
        $count=1;
        foreach ($result as $row) {
        $attendance_status="";
        if($row->state_id=='0') { 
        $attendance_status="Pending.....";
        $class ="text-warning";
        }
        if($row->state_id=='1') { 
        $attendance_status="Present";
        $class ="text-success";
        }
        if($row->state_id=='2') { 
        $attendance_status="Absent";
        $class ="text-danger";
        }
        if($row->state_id=='3') { 
        $attendance_status="Half Day";
        $class ="text-primary";
        }
        if($row->state_id=='4') { 
        $attendance_status="Short Leave";
        $class ="text-secondary";
        }
        $html.='<tr>
        <td>'.$count.'</td>
        <td>'.$row->time_in.'</td>
        <td>'.$row->time_out.'</td>
        <td>'.$row->working_hours.'</td>
        <td class='.$class.'>'.$attendance_status.'</td>
        </tr>';
        $count++;
        } 
        return response()->json($html);
    }
}
