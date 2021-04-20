<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Auth;
use DateTime; 
class TimeoutController extends Controller
{
    public function time_out(Request $request)
    {
    	$id = $request->input('user_id');
		$data= Attendance::where(["user_id" =>$id])->where(['created_at'=>date('Y-m-d')])->first();
		$timeout = $request->input('timeout');	 
		$data->time_out = $timeout;
		$data->state_id= 1; 
		$data->updated_at = $request->input('newdt');
        
        $today= Attendance::where(["user_id" => auth::user()->id])->where(['created_at'=>date('Y-m-d')])->first();
        $timein = $today->time_in;
		$datetime1 = new DateTime($timein);
		$datetime2 = new DateTime($timeout);
		$interval = $datetime1->diff($datetime2);
		$total= $interval->format('%hh %im');
		$data->working_hours = $total;
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
        echo json_encode(array('total'=>$total,'html'=>$html));
    }
}
