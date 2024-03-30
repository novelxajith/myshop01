<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the user user_type
        if (Auth::check() && Auth::user()->user_type == 'u') {
            return $next($request);
        }

        // If not a user, you may redirect, show an error, or take other actions
        return redirect()->route('index')->with('error', 'Unauthorized Access');
    }
}
