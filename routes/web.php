<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::get('/', [VisitorController::class, 'index'])->name('home');

Route::get('/adminLogin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/adminLogin', [AuthController::class, 'login']);

Route::get('/createVisitor', [VisitorController::class, 'create'])->name('create');
Route::post('/visitors', [VisitorController::class, 'store'])->name('store');