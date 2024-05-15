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
        $user = $authService->getUser($token);

        try{
            if (!$user) {
                throw new Exception('user not found');
            }

            return $user;

        } catch(Exception) {
            throw new Exception('user not found');
        }
    }
}
