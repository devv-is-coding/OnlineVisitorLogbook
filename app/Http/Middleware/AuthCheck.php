<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('id')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }
        return $next($request);
    }
}
