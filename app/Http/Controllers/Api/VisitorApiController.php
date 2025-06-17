<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorApiController extends Controller
{
    public function index()
    {
        return response()->json(Visitor::all());
    }

    public function store(Request $request)
    {
        $visitor = Visitor::create($request->all());
        return response()->json($visitor, 201);
    }

    public function edit(Visitor $visitor)
    {
        return response()->json($visitor);
    }

    public function update(Request $request, Visitor $visitor)
    {
        $visitor->update($request->all());
        return response()->json($visitor);
    }

    public function timeout(Visitor $visitor)
    {
        $visitor->update(['timeout' => now()]);
        return response()->json($visitor);
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return response()->json(null, 204);
    }
}
