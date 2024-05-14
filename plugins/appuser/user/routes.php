<?php

use AppUser\User\Middleware\authUserLogin;


Route::prefix('api/v1/')->group(function(){

    Route::post('register', 'AppUser\User\http\controllers\Register@register');
    Route::post('login', 'AppUser\User\http\controllers\Login@login');

    Route::middleware([authUserLogin::class])->group(function(){

        Route::get('user', 'AppUser\User\http\controllers\UserController@user');
        Route::post('logout', 'AppUser\User\http\controllers\LogOut@logOut');
        Route::get('logs/name', 'applogger\logger\http\controllers\GetLog@getName');
    
    });
});