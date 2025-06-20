<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/adminLogin', 'login');
    Route::post('/adminLogout', 'logout');
});
