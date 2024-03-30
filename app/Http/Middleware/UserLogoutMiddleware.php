<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $userType)
    {
        $user = Auth::user();

        if ($user && $user->user_type === $userType) {
            Auth::logout();
           // return redirect("/login/{$userType}"); // Redirect to the login page for the specific user type
           return redirect()->route('index');
        }

        return $next($request);
    }
}
