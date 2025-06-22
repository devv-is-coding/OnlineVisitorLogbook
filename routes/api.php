<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

require __DIR__ . '/api/visitor.php';
require __DIR__ . '/api/auth.php';

Route::middleware([
   EnsureFrontendRequestsAreStateful::class,
    'auth:sanctum'
])->group(function () {
    require __DIR__ . '/api/admin.php';
});
