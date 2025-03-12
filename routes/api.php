<?php

use App\Http\Controllers\V1\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name('v1.auth.login');
        Route::post('/register', [AuthController::class, 'register'])->name('v1.auth.register');
        Route::post('/logout', [AuthController::class, 'logout'])->name('v1.auth.logout');
        Route::post('/me', [AuthController::class, 'me'])->name('v1.auth.me');
        Route::post('/logout', [AuthController::class, 'logout'])->name('v1.auth.me');
    });
});
