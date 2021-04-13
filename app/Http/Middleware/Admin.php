<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

use App\Http\Models\User;
use App\Http\Models\role;




class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
     
        if (Auth::check() && Auth::User()->isAdmin()) {
            return $next($request);
        }
        return redirect('admin/login')->with('error', "You don't have admin access.");
    }
    

}
    // auth()->user() && Auth::user()->isAdmin()
