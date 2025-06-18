<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
   /**
     * URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Exempt all visitor API endpoints
        'api/visitor/*',
        'api/visitor',
        // If you have other API endpoints:
        'api/auth/*',
        'sanctum/csrf-cookie',
    ];
}
