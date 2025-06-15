<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function ViewVisitors(){
        $visitors = Visitor::all();
        return view ('layouts.ViewVisitors', compact('visitors'));

    }
}
