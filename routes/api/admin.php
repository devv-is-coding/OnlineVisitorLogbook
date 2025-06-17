<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'adminPanel');
});