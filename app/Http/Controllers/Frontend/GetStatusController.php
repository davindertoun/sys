<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class GetStatusController extends Controller
{
    public function get_user_status()
    {
    	$date = now();
		$Birthday= User::whereMonth('dob', '>', $date->month)->orWhereMonth('dob', '=', $date->month)->whereDay('dob', '>=', $date->day)->take(5)->orderByRaw('DATE_FORMAT(dob, "%m-%d")')->get();
		$html='';
		foreach($Birthday as $Bday)
		{
			$class="border-danger";
			$time = time();
              if($Bday->last_login>$time) {
              $class="border-success";
            }
            $html.='<li class="list-inline-item">
        <p class="float-right"><b> '.$Bday->name.'</b></p>
              <div class="float-left">
                <img style=" margin-bottom:10px; float:left;width:50px;height:50px;" class="profile-user-img img-fluid img-circle '.$class.'"src="'.$Bday->profile_img.'"alt="User profile picture"></div>
              </li>';
		}
		return response()->json($html);
    }
}
