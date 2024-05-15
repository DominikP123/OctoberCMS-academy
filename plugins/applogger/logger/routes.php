<?php
/* REVIEW - Potom pre všetky tieto funkcie by si mohol mať jeden LoggerController, namiesto toho aby si mal ešte aj GetLog.
V podstate všetky akcie čo sa týkajú logov patria/môžu byť v jednom controlleri (ak ich nie je moc veľa)
Potom by mal jeden controller s funkciami "get", "create", ... */

use AppLogger\Logger\Http\Controllers\LoggerController;

Route::prefix('api/v1')->group(function () {

    Route::post('logs/create', [LoggerController::class, 'createLog']);
    Route::get('logs', [LoggerController::class, 'getLogs']);
    Route::get('logs/name/arrivals', [LoggerController::class, 'getLogByName']);
    /* REVIEW - Tu by som tiež len trefnejšie nastavil route, momentálne je to tak že sa posiela GET na {{host}}/api/v1/logs/name?name=test
    na prvý pohľad je takýto route celkom nezrozumiteľný, dali by sa to pochopiť aj tak že získavaš meno logu a pod.
    Keďže získavaš iba arrival times na základe mena, route by som pozmenil na niečo ako GET - {{host}}/api/v1/logs/{test}/arrivals
    Pri pomenovávaní routes sa vždy riaď na základe čoho získavaš nejaké údaje, a aké údaje získavaš */
});

// REVIEW - Tieto veci pre routes prosím aplikuj aj v ostatných routes.php
