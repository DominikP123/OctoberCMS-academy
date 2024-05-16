<?php

use AppLogger\Logger\Http\Controllers\LoggerController;

Route::prefix('api/v1')->group(function () {

    Route::post('logs/create', [LoggerController::class, 'createLog']);
    Route::get('logs', [LoggerController::class, 'getLogs']);
    Route::get('logs/{name}/arrivals', [LoggerController::class, 'getLogByName']);
 
});

