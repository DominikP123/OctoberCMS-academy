<?php namespace AppUser\User\http\controllers;

use AppUser\User\http\Resources\UserResource;
use Backend\Classes\Controller;
use AppUser\User\Models\User;
use Exception;
use AppUser\User\Classes\Services;


class UserController extends Controller
{     
    public function register()
    {
        $username = input('username');
        $password = input('password');

        $token = Services::register($username, $password); 

        return $token;
    }

    public function login()
    {
        $username = input('username');
        $password = input('password');

        $token = Services::login($username, $password);

        return $token;
    }

    public function logOut()
    {
        $token = request()->bearerToken();

        $user = Services::logOut($token);

        return response()->json('User has been log out');
    }

    public function user()
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if (!$user) {
            throw new Exception('user not found');
        } 

        return UserResource::make($user);
    }
}
