<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginRegisterController extends Controller
{
        public function admin_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('admin')->attempt($credentials)) {
            $user = auth()->guard('admin')->user();

            if ($user->user_type == "a") {
                $request->session()->regenerate();
                Log::info('Admin logged in successfully', [
                    'email' => $credentials['email'],
                    'ip' => $request->ip(),
                    'timestamp' => now(),
                ]);
                //dd('Debugging point');
                return redirect()->route('indexx');
                //return redirect('/admin');

            } else {
                auth()->guard('admin')->logout();
                Log::warning('Unauthorized access attempt', [
                    'email' => $credentials['email'] ?? null,
                    'ip' => $request->ip(),
                    'timestamp' => now(),
                ]);
                return redirect()->back()->with('error', 'Unauthorized Access');
            }
        } else {
            auth()->guard('admin')->logout();
            Log::warning('Invalid credentials during login attempt', [
                'email' => $credentials['email'] ?? null,
                'ip' => $request->ip(),
                'timestamp' => now(),
            ]);
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }


    public function ecommerce_login(Request $request)
{

    $credentials = $request->only('email', 'password');
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if the user has the role of u
        if ($user->user_type == "u") {
            $request->session()->regenerate();
            Log::info('user logged in successfully',['email' => $credentials['email'],]);
            return redirect()->route('index');
                  
        } else {
            // If the user doesn't have the required role, log them out
            Auth::logout();
            Log::warning('user login attempt failed', [
                'email' => $credentials['email'] ?? null,
                'ip' => $request->ip(),
            ]);
            return redirect()->back()->with('error', 'Unauthorized Access');
        }
    } else {
        return redirect()->back()->with('error', 'Invalid Credentials');
    }
}

public function logout_user()
{
    return redirect('/index'); // Redirect to the common login page
}



public function admin_logout()
{
    Auth::guard('admin')->logout();

    return redirect()->route('adminSignin'); // Redirect to the login page or any other page you prefer
}


    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
