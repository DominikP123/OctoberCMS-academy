<?php namespace AppUser\User\http\controllers;

use AppUser\User\http\Resources\UserResource;
use Backend\Classes\Controller;
use AppUser\User\Models\User;
use Exception;
use AppUser\User\Classes\Services;
use Request;

class UserController extends Controller
{     
    public function register()
    {
        $username = input('username');
        $password = input('password');

        $token = Services::register($username, $password); // REVIEW pri každej statickej funkcii z Services.php mi to tu ukazuje že tie funkcie nemáš nastavené ako static, tebe to ukazuje taký modrý underline?

        if (!$token) {
            throw new Exception('user not found', $token); // REVIEW Tu moc nedáva zmysel checkovať token keďže register ti buď hodí error pri savovaní alebo prejde v pohode, daj vedieť či ti to dáva zmysel
        }

        return $token;
    }

    public function login()
    {
        $username = input('username');
        $password = input('password');

        $token = Services::login($username, $password);

        if (!$token) { 
            throw new Exception('user not found', $token); // REVIEW Podobne ako pri register mi tu moc nedáva zymsel tento check
        }

        return $token;
    }

    public function logOut()
    {
        $token = input('token'); // REVIEW Toto nepremeníš tiež na header bearerToken?

        $user = Services::logOut($token);

        if (!$user) {
            throw new Exception('user not found'); // REVIEW Tu dokonca máš napísané že logOut vracia $user aj keď vracia $token
        }     

        return response()->json('User has been log out');
    }

    public function user()
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if (!$user) {
            throw new Exception('user not found');
        } 

        return UserResource::make($user); // REVIEW Chválim resource xDD
    }
}
