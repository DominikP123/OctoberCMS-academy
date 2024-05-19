<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppUser\User\Classes\AuthService;
use Exception;


class UserController extends Controller
{       
    public function user()
    {
        $token = input('token');

        $authService = new AuthService();
        /* REVIEW Logika ktorá je v AuthService by mohla byť kľudne napísaná rovno tu, keďže nikde inde okrem UserController.php ju nepoužívaš */
        $user = $authService->getUser($token);

        try{
            /* REVIEW úplne nechápem význam try-catch blockov ktoré si pridal na rôznych miestach, v prípadoch ako sú tieto môžeš rovno hodiť error bez toho a bude to mať rovnaký efekt
            Keď som hovoril že máš zapracovať error handling tak som myslel aby si nahradil response(..., 500) za throw new Exception(), try-catch treba v iných situáciach... */
            if (!$user) {
                throw new Exception('user not found');
            }

            return $user;

        } catch(Exception) {
            throw new Exception('user not found');
        }
    }
}
