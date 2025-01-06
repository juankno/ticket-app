<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {

    Route::post('/register', [\App\Http\Controllers\Api\V1\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [\App\Http\Controllers\Api\V1\AuthController::class, 'user']);
        Route::post('/logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout']);

        Route::apiResource('tickets', \App\Http\Controllers\Api\V1\Ticket\TicketsController::class);
        Route::get('tickets/report', \App\Http\Controllers\Api\V1\Ticket\TicketReportController::class);
    });
});
