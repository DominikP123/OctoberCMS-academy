<?php

Route::prefix('api/v1')->group(function () {
    Route::post('logs/create', 'applogger\logger\http\controllers\LoggerController@logger');
    Route::get('logs', 'applogger\logger\http\controllers\GetLog@getLogger');
    Route::get('logs/name', 'applogger\logger\http\controllers\GetLog@getName');
});

