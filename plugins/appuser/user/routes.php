<?php


Route::prefix('admin')->group(function(){
    Route::post('user', 'AppUser\User\Controllers\UserController@user');
    Route::post('register', 'AppUser\User\Classes\AuthService@register');
    Route::get('logs/name', 'AppLogger\Logger\http\controllers\GetLog@getName');
});

Route::prefix('user/')->middleware('authuserLogin')->group(function(){
    Route::post('user', 'AppUser\User\http\controllers\UserController@user');
    Route::post('login', 'AppUser\User\http\controllers\TestController@login');
    Route::get('logs/name', 'applogger\logger\http\controllers\GetLog@getName');

});


Route::post('register', 'AppUser\User\http\controllers\TestController@register');


