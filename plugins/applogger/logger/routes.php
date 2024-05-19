<?php

use AppLogger\Logger\Http\Controllers\LoggerController;

Route::prefix('api/v1')->group(function () {
    /* REVIEW Jeden z týchto routov má tak isto napísaný v user routes, takže máš ako keby duplikátny route...
    A taktiež tieto routes by mali byť závislé od toho či je user prihlásený, a teda by tu mal byť ten middleware
    A potom napr. getLogs by malo vracať logs len pre určitého usera, to isté pri getLogsByName
    Takže ja by som skôr posielal do requestu nejaký authorization header (napr. bearerToken), ten by si vytiahol z requestu,
    cez middle ware by si overil či je user prihlásený a ak hej tak by cez ten token získal model usera a s tým by si ďalej pracoal
    Daj vedieť či to dáva zmysel */
    Route::post('logs/create', [LoggerController::class, 'createLog']);
    Route::get('logs', [LoggerController::class, 'getLogs']);
    Route::get('logs/{name}/arrivals', [LoggerController::class, 'getLogByName']);
 
});

