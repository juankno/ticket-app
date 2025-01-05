<?php

use Illuminate\Support\Facades\Route;


Route::post('/register', [\App\Http\Controllers\Api\V1\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [\App\Http\Controllers\Api\V1\AuthController::class, 'user']);
    Route::post('/logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout']);
});
