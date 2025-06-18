<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    // Public login endpoint
    Route::post('/adminLogin', 'login');

    // Logout endpoint — no Sanctum middleware
    // (the controller still uses Auth::guard('admin'))
    Route::post('/adminLogout', 'logout');
});
