<?php

    
Route::post('/login', 'AppUser\User\Controllers\TestController@login');
Route::post('/register', 'AppUser\User\Controllers\TestController@register');
Route::post('appuser/user/controllers/users', 'AppUser\User\Controllers\TestController@register');


