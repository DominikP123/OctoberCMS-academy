<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Exception;
use Illuminate\Http\Request;
use AppUser\User\Classes\RegisterService;

class Register extends Controller
{
    public function register(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $registerService = new RegisterService();
        $registerService->register($username, $password);

        try{

            $token = $registerService->register($username, $password);

            if (!$token) {

                throw new Exception('user not found', $token);
            }

            return response()->json($token, 201);

        }catch(Exception){

            throw new Exception('user not found');

        }
    }
}
