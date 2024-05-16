<?php

use AppUser\User\Middleware\authUserLogin;
use AppUser\User\http\controllers\Login;
use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\http\controllers\LogOut;
use AppUser\User\http\controllers\Register;
use AppUser\User\http\controllers\UserController;

Route::prefix('api/v1/')->group(function(){

    Route::post('register', [Register::class, 'register']);
    Route::post('login', [Login::class, 'login']);

    Route::middleware([authUserLogin::class])->group(function(){

        Route::get('user', [UserController::class, 'user']);
        Route::post('logout', [LogOut::class, 'logOut']);
        Route::get('logs/{name}/arrivals', [LoggerController::class, 'getLogByName']);
    
    });
});