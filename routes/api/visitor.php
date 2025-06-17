<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::prefix('visitor')->controller(VisitorController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/createVisitor', 'create');
    Route::post('/', 'store');
    Route::get('/{visitor}/edit', 'edit');
    Route::patch('/{visitor}', 'update');
    Route::patch('/{visitor}/timeout', 'timeout');
    Route::delete('/{visitor}', 'destroy'); 
});