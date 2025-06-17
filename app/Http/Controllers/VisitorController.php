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
    public function adminViewVisitors()
    {
        $visitors = Visitor::all();
        return view('admin.visitors', compact('visitors'));
    }
}
