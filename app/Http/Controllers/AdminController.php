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
        $visitors = Visitor::with('sex')->get();
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data'    => [
                'admins'   => $admins,
                'visitors' => $visitors,
                ],
            ]);
        }
        return view('layouts.AdminPanel', compact('admins', 'visitors'));
    }
}
