<?php

use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\Middleware\authUserLogin;

Route::prefix('api/v1')->middleware(authUserLogin::class)->group(function () {
    /* REVIEW 
    Takže ja by som skôr posielal do requestu nejaký authorization header (napr. bearerToken), ten by si vytiahol z requestu,
    cez middle ware by si overil či je user prihlásený a ak hej tak by cez ten token získal model usera a s tým by si ďalej pracoal
    Daj vedieť či to dáva zmysel */
    Route::post('logs/create', [LoggerController::class, 'createLog']);
    Route::get('logs', [LoggerController::class, 'getLogs']);
});

