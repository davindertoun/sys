<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\User;
use App\Http\Models\Role;
use Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        
        if ($request->isMethod('POST')) {
        
            $validator = Validator::make($request->only('email', 'pwd'), [
                'email' => 'email|required',
                'pwd' => 'required'
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $admin = [
                'email' => $request->email,
                'password' => $request->pwd
            ];
            
            if (Auth::attempt($admin)) {
               
                return redirect('admin/profile');
            } else {
                echo "failed";
            }
        }
        return view('backend/dashboard/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function userProfile(Request $request)
    {
        return view('backend/dashboard/profile');
    }
}
