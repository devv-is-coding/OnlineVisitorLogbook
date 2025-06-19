<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('id')) {
            return redirect()->route('adminPanel');
        }
        return view('auth.loginad');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)
                      ->orWhere('username', $request->email)
                      ->first();

        $credentialsOk = $admin 
            && Hash::check($request->password, $admin->password);

        if (! $credentialsOk) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials.'
                ], 401);
            }
            return back()->with('error', 'Invalid credentials.');
        }

        Auth::guard('admin')->login($admin);
        Session::put('id', $admin->id);
        Session::regenerate();

        Cookie::queue('admin_logged_in', '1', 60);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data'    => $admin,
            ], 200);
        }

        return redirect()
            ->route('adminPanel')
            ->with('success', 'Logged in successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Session::forget('id');
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
            ], 200);
        }

        return redirect()
            ->route('login')
            ->with('success', 'Logged out successfully.');
    }
    
}
