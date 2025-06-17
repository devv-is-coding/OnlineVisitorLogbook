<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::get('/', [VisitorController::class, 'ViewVisitors'])->name('home');

Route::get('/adminLogin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/adminLogin', [AuthController::class, 'login']);