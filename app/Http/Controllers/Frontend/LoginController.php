<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Leave;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    { 
    	if($request->isMethod('post'))
    	{
			$validator = Validator::make($request->only('email','password'),[
			'email'    => 'required|email',
    		'password' => 'required'
    		]);
			if ($validator->fails()) 
			{
		    	return back()
		        ->withErrors($validator) 
		        ->withInput(); 
			}
			$userdata =['email' => $request->email,
						'password' => $request->password];
		 	if (Auth::attempt($userdata))
		 	{	
		 		// $request->session()->regenerate();
		 		if(Auth::user()->isTL()){
		 			return redirect('tl');
		 		}
		 		if(Auth::user()->isManager()){
		 			return redirect('manager');
		 		}
		 		if(Auth::user()->isUser()){
				return redirect('user');
				}
			}
			else
			{
				Auth::logout();
				return back()->withErrors(['message'=>'Invalid Email or Password ']);
			} 
		}
		return view('frontend/login');
	}
	public function logout(Request $request)
	{
	    Auth::logout();
	    // $request->session()->invalidate();
	    // $request->session()->regenerateToken();
	    return redirect('/');
	}
}