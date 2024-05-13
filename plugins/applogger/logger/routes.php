<?php

/* REVIEW - Controller funkcie by si mohol volať inak lebo takto cez jeden string je to neprehladné.
Tento string napr. 'applogger\logger\http\controllers\LoggerController@logger', môžeš prerobiť spôsobom že najprv use-neš "AppLogger\Logger\Http\Controllers\LoggerController"
a naśledne namiesto toho strigu dáš "[LoggerController::class, 'getLogger']". Takto je lepšie vidieť aký controller a aká funkcia v ňom sa používa */

/* REVIEW - Potom pre všetky tieto funkcie by si mohol mať jeden LoggerController, namiesto toho aby si mal ešte aj GetLog.
V podstate všetky akcie čo sa týkajú logov patria/môžu byť v jednom controlleri (ak ich nie je moc veľa)
Potom by mal jeden controller s funkciami "get", "create", ... */

Route::prefix('api/v1')->group(function () {
    Route::post('logs/create', 'applogger\logger\http\controllers\LoggerController@logger');
    Route::get('logs', 'applogger\logger\http\controllers\GetLog@getLogger');
    Route::get('logs/name', 'applogger\logger\http\controllers\GetLog@getName');
    /* REVIEW - Tu by som tiež len trefnejšie nastavil route, momentálne je to tak že sa posiela GET na {{host}}/api/v1/logs/name?name=test
    na prvý pohľad je takýto route celkom nezrozumiteľný, dali by sa to pochopiť aj tak že získavaš meno logu a pod.
    Keďže získavaš iba arrival times na základe mena, route by som pozmenil na niečo ako GET - {{host}}/api/v1/logs/{test}/arrivals
    Pri pomenovávaní routes sa vždy riaď na základe čoho získavaš nejaké údaje, a aké údaje získavaš */
});

// REVIEW - Tieto veci pre routes prosím aplikuj aj v ostatných routes.php
