<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Exception;
use AppUser\User\Classes\RegisterService;

class Register extends Controller
{
    public function register()
    {
        $username = input('username');
        $password = input('password');

        $registerService = new RegisterService();
        $token = $registerService->register($username, $password);

        try{
            if (!$token) {
                throw new Exception('user not found', $token);
            }

            return $token;

        }catch(Exception){
            throw new Exception('user not found');
        }
    }
}
