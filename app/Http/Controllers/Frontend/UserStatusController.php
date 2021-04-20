<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserStatusController extends Controller
{
   public function update_user_status()
   {
   	$time = time()+10;
    $id = auth()->user()->id;
    $data= User::where(["id" => $id])->first();
	$data->last_login =$time;
	$data->save();
   }
}
