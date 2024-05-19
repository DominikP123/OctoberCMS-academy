<?php

use AppUser\User\Middleware\authUserLogin;
use AppUser\User\http\controllers\Login;
use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\http\controllers\LogOut;
use AppUser\User\http\controllers\Register;
use AppUser\User\http\controllers\UserController;

Route::prefix('api/v1/')->group(function(){

    Route::post('register', [Register::class, 'register']);
    Route::post('login', [Login::class, 'login']);
    /* REVIEW Vidím že máš logiku rozdelenú medzi napr. Login -> LoginService, alebo Register -> RegisterService, LogOut -> LogOutService
    Logika v Login/Register/LogOut je celkom dosť malá, čiže by bolo lepšie spojiť ich s tými Services, budeš tak mať 2-krát súborov
    A ďalej by som tu urobil to isté čo som ti predtým hovoril pri Logoch, že by si mal spojiť logiku ktorá súvisí do jedného controlleru
    Predtým to bol LoggerController.php, teraz by si mohol všetku túto logiku ako Login/Register/Logout spojiť do UsreControlleru, keďže to všetko súvisí s userom
    Takže nakoniec by si mal len (nie tak veľký) 1 súbor, namiseto tak 9 súborov ktoré máš teraz */

    Route::middleware([authUserLogin::class])->group(function(){

        Route::get('user', [UserController::class, 'user']);
        Route::post('logout', [LogOut::class, 'logOut']);
        Route::get('logs/{name}/arrivals', [LoggerController::class, 'getLogByName']);
    
    });
});