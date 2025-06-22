<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Visitor;

class AdminController extends Controller
{
    public function adminPanel(Request $request)
    {
        $admins = Admin::all();
        $adminsCount = $admins->count();

        // Handle visitor search filtering
        $visitorsQuery = Visitor::with('sex');

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $visitorsQuery->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere('middlename', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%")
                    ->orWhere('purpose_of_visit', 'like', "%{$search}%");
            });
        }

        $visitors = $visitorsQuery->orderByDesc('created_at')->get();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data'    => [
                    'admins'   => $admins,
                    'visitors' => $visitors,
                ],
            ]);
        }

        return view('layouts.AdminPanel', compact('admins', 'adminsCount', 'visitors'));
    }
}
