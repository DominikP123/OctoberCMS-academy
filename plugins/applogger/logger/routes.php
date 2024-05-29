<?php

use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\Middleware\authUserLogin;

Route::prefix('api/v1')->middleware(authUserLogin::class)->group(function () {
    Route::post('logs/create', [LoggerController::class, 'createLog']);
    Route::get('logs', [LoggerController::class, 'getLogs']);
});

