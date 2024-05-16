<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Exception;
use AppUser\User\Classes\LoginService;

class Login extends Controller
{    
    public function login()
    {
        $username = input('username');
        $password = input('password');

        $loginService = new LoginService();
        $token = $loginService->login($username, $password);

        try{
            if (!$token) { 
                throw new Exception('user not found', $token);
            }

            return $token;

        } catch(Exception) { 
            throw new Exception('user not found');
        }
    }
}
