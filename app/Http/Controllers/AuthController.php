<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            Session::put('id', $admin->id);
            Session::regenerate();
            return redirect()->route('adminPanel')->with('success', 'Logged in successfully.');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        if (! Session::has('id')) {
        return redirect()->route('login');
    }
        Auth::logout();
        Session::forget('id');
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
