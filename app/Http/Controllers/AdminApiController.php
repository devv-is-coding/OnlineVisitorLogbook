<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    public function panel(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'visitors' => Visitor::latest()->get(),
                'admins' => Admin::all(),
            ],
        ]);
    }
}
