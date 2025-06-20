<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;


Route::get('/', [VisitorController::class, 'index'])->name('home');
Route::get('/createVisitor', [VisitorController::class, 'create'])->name('create');
Route::post('/visitors', [VisitorController::class, 'store'])->name('store');
Route::get('/visitors/{visitor}/edit', [VisitorController::class, 'edit'])->name('edit');
Route::patch('/visitors/{visitor}', [VisitorController::class, 'update'])->name('update');

Route::get('/login', function () {
    return redirect()->route('adminLogin');
})->name('login');

Route::get('/adminLogin', [AuthController::class, 'showLoginForm'])->name('adminLogin');
Route::post('/adminSubmitLogin', [AuthController::class, 'adminSubmitLogin'])->name('adminSubmitLogin');

Route::middleware(AuthCheck::class)->group(function () {
    Route::get('/adminPanel',   [AdminController::class, 'adminPanel'])->name('adminPanel');
    Route::post('/adminLogout', [AuthController::class, 'logout'])->name('logout');
    Route::patch('/visitors/{visitor}/timeout', [VisitorController::class, 'timeout'])->name('timeout');
    Route::delete('/visitors/{visitor}', [VisitorController::class, 'destroy'])->name('delete');
});
