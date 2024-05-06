<?php


Route::prefix('admin/')->group(function(){
    Route::get('user', 'AppUser\User\http\controllers\UserController@user');
    Route::post('login', 'AppUser\User\http\controllers\Login@login');
    Route::post('register', 'AppUser\User\http\controllers\Register@register');
    Route::post('logout', 'AppUser\User\http\controllers\LogOut@logOut');
    Route::get('logs/name', 'AppLogger\Logger\http\controllers\GetLog@getName');
});

Route::prefix('user/')->middleware('authUserLogin')->group(function(){
    Route::get('user', 'AppUser\User\http\controllers\UserController@user');
    Route::post('login', 'AppUser\User\http\controllers\Login@login');
    Route::post('logout', 'AppUser\User\http\controllers\LogOut@logOut');
    Route::get('logs/name', 'applogger\logger\http\controllers\GetLog@getName');

});


Route::post('register', 'AppUser\User\http\controllers\Register@register');
Route::post('login', 'AppUser\User\http\controllers\Login@login');
Route::post('logout', 'AppUser\User\http\controllers\LogOut@logOut');
Route::get('user', 'AppUser\User\http\controllers\UserController@user');
