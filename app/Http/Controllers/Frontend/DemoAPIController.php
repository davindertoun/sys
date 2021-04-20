<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DemoAPIController extends Controller
{
   public function demo($id = null)
   {
   	 return $id? User::find($id): User::all();

   } 
}
