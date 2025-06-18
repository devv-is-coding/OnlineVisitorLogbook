<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Visitor;

class AdminController extends Controller
{
    public function adminPanel(Request $request)
    {
        $admins   = Admin::all();
        $visitors = Visitor::latest()->get();

        // If this is an AJAX/API call, return JSON:
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data'    => [
                    'admins'   => $admins,
                    'visitors' => $visitors,
                ],
            ]);
        }

        // Otherwise, render your Blade view as before:
        return view('adminPanel', compact('admins', 'visitors'));
    }
}
