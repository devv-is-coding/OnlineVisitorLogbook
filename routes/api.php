<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

// Route::get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });


Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    require __DIR__ . '/api/admin.php';
    require __DIR__ . '/api/visitor.php';;
});
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
    require __DIR__ . '/api/admin.php';
});
