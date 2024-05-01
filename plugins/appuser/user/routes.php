<?php

Route::group([
        'prefix' => 'jwt',
    ], static function () {

    Route::post('login', \ReaZzon\JWTAuth\Http\Controllers\AuthController::class);
    Route::post('refresh', \ReaZzon\JWTAuth\Http\Controllers\RefreshController::class);
    Route::post('register', \ReaZzon\JWTAuth\Http\Controllers\RegistrationController::class);
});



Route::post('user', 'AppUser\User\Controllers\UserController@user')->middleware('MiddleWare');
Route::post('/register', 'AppUser\User\Controllers\TestController@register');



/*


Route::post('/login', 'AppUser\User\Controllers\TestController@login');

Route::post('/protected-route', [
    'middleware' => 'auth',
    'uses' => 'AppUser\User\Controllers\TestController@getUserInfo'
]);

*/

