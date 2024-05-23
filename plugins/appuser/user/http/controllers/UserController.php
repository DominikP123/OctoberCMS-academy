<?php namespace AppUser\User\http\controllers;

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

        $registerService = new Services();
        $token = $registerService->register($username, $password);

        if (!$token) {
            throw new Exception('user not found', $token);
        }

        return $token;
    }

    public function login()
    {
        $username = input('username');
        $password = input('password');

        $loginService = new Services();
        $token = $loginService->login($username, $password);

        if (!$token) { 
            throw new Exception('user not found', $token);
        }

        return $token;
    }

    public function logOut()
    {
        $token = input('token');

        $logOutService = new Services();
        $user = $logOutService->logOut($token);

        if (!$user) {
            throw new Exception('user not found');
        }     

        return response()->json('User has been log out');
    }

    public function user()
    {
        $token = input('token');

        $user = User::where('token', $token)->first();

        if (!$user) {
            throw new Exception('user not found');
        } 

        return ([ 
            'username' => $user->username,
            'delay' => $user->delay,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }
}
