<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('loginad');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $admin = Admin::where('email', $credentials['email'])
            ->orWhere('username', $credentials['email'])
            ->first();

        if ($admin && $credentials['password'] === $admin->password) {
            session(['admin_id' => $admin->id]);
            return redirect('/');
        }

        return back()->with('error', 'Invalid login credentials.');
    }
}
