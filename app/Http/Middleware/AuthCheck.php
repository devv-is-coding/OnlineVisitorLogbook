<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
       if(!Session::get('id')) {
       return redirect('login')->with('error', 'Please login first');  
       }
        return $next($request);
    }
}
