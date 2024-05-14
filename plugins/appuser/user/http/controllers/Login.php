<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Exception;
use AppUser\User\Classes\LoginService;

class Login extends Controller
{    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $loginService = new LoginService();
        $loginService->login($username, $password);

        try{

            $token = $loginService->login($username, $password);

            if (!$token) { 

                throw new Exception('user not found', $token);

            }

            return response()->json($token);

        } catch(Exception) { // REVIEW - medzery

            throw new Exception('user not found');

        }
    }
}
