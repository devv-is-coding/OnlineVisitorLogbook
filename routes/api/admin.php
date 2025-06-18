<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])
     ->prefix('admin')->controller(AdminController::class)
     ->group(function () {
         Route::get('/', 'adminPanel');
});
