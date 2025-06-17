<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/adminLogin', 'login');
  });
  Route::prefix('auth')->middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::post('/adminLogout', 'logout');
  });

