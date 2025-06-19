<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use App\Models\Sex;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::all();
        return view('layouts.ViewVisitors', compact('visitors'));
    }
    public function create()
    {
        return view('layouts.CreateVisitor', [
            'sexes' => Sex::all(),
        ]);
    }
    public function edit(Visitor $visitor)
    {
        return view('layouts.UpdateVisitor', [
            'visitor' => $visitor->load('sexes'),
            'sexes'   => Sex::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'sex_id' => 'required|exists:sexes,id',
            'age' => 'required|integer',
            'contact_number' => 'required|string',
            'purpose_of_visit' => 'required|string|max:500',
        ]);

        $visitor = Visitor::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'contact_number' => $request->contact_number,
            'purpose_of_visit' => $request->purpose_of_visit,
            'time_out' => null,
        ]);
        $visitor->sexes()->attach($request->sex_id);


        return redirect()->route('home')->with('success', 'Visitor added successfully!');
    }
    public function update(Request $request, Visitor $visitor)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'sex_id' => 'required|exists:sexes,id',
            'age' => 'required|integer|min:0',
            'contact_number' => 'required|string',
            'purpose_of_visit' => 'required|string',
        ]);

        $visitor->update($data);
        $visitor->sexes()->sync([$request->sex_id]);

        return redirect()->route('home')->with('success', 'Visitor updated successfully.');
    }
    public function timeout(Visitor $visitor)
    {
        $visitor->time_out = Carbon::now();
        $visitor->save();
        return redirect()->route('adminPanel')->with('success', 'Visitor marked as timed out.');
        return response()->json(['success' => true]);
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('adminPanel')->with('success', 'Visitor deleted successfully.');
    }
}
