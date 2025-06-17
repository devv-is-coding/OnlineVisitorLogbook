<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Visitor;


class AdminController extends Controller
{

    public function adminPanel()
    {
        $admins = Admin::all();
        $visitors = Visitor::all();
        return view('layouts.AdminPanel', compact('admins', 'visitors'));
    }
}
