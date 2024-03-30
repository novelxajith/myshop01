<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {    
        //dd('Inside AdminMiddleware');
        // Check if the user is authenticated using the 'admin' guard and has the admin user_type
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type == 'a') {
            return $next($request);
        }

        // If not an admin, you may redirect, show an error, or take other actions
        return redirect()->route('adminSignin')->with('error', 'Unauthorized Access');
    }


    
}
