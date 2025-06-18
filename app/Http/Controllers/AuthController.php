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
        // If the session already has an admin id, treat as web user
        if (Session::has('id')) {
            return redirect()->route('adminPanel');
        }
        return view('auth.loginad');
    }

    public function login(Request $request)
    {
        // 1) Validate credentials as before
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        // 2) Find admin by email or username
        $admin = Admin::where('email', $request->email)
                      ->orWhere('username', $request->email)
                      ->first();

        $credentialsOk = $admin 
            && Hash::check($request->password, $admin->password);

        // 3) If bad creds, respond JSON (for API) or back‑redirect (for web)
        if (! $credentialsOk) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials.'
                ], 401);
            }
            return back()->with('error', 'Invalid credentials.');
        }

        // 4) Credentials valid: log in
        Auth::guard('admin')->login($admin);
        Session::put('id', $admin->id);
        Session::regenerate();

        Cookie::queue('admin_logged_in', '1', 60);

        // 5a) If API call, return JSON admin data
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data'    => $admin,
            ], 200);
        }

        // 5b) Otherwise (normal web), redirect with flash
        return redirect()
            ->route('adminPanel')
            ->with('success', 'Logged in successfully.');
    }

    public function logout(Request $request)
    {
        // If it’s an API call, return JSON; if web, redirect:
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
