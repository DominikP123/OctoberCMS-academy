<?php

use AppUser\User\Middleware\authUserLogin;
use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\http\controllers\UserController;

Route::prefix('api/v1/')->group(function(){

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);

    Route::middleware(authUserLogin::class)->group(function(){

        Route::get('user', [UserController::class, 'user']);
        Route::post('logout', [UserController::class, 'logOut']);
        Route::get('logs/{name}/arrivals', [LoggerController::class, 'getArrivalsTime']);
    
    });
});