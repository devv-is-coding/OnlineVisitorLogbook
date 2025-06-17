<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VisitorApiController;

Route::prefix('visitor')->controller(VisitorApiController::class)->group(function ()  {
    Route::get('/', 'index'); // returns JSON
    Route::post('/', 'store');
    Route::get('/{visitor}/edit', 'edit');
    Route::patch('/{visitor}', 'update');
    Route::patch('/{visitor}/timeout', 'timeout');
    Route::delete('/{visitor}', 'destroy');
});
