<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        // Remove these lines - let Sanctum handle CSRF for API routes
        // 'api/visitor/*',
        // 'api/visitor',
        // 'api/auth/*',
        // 'sanctum/csrf-cookie',
    ];
}
