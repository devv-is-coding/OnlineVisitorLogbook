<?php
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    require __DIR__ . '/api/admin.php';
require __DIR__ . '/api/visitor.php';
require __DIR__ . '/api/auth.php';
});