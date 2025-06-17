<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::all();
        return view('layouts.ViewVisitors', compact('visitors'));
    }
    public function create()
    {
        return view('layouts.CreateVisitor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female',
            'age' => 'required|integer',
            'contact_number' => 'required|string',
            'purpose_of_visit' => 'required|string|max:500',
        ]);

        \App\Models\Visitor::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'sex' => $request->sex,
            'age' => $request->age,
            'contact_number' => $request->contact_number,
            'purpose_of_visit' => $request->purpose_of_visit,
            'time_out' => null,
        ]);

        return redirect()->route('home')->with('success', 'Visitor added successfully!');
    }
}
