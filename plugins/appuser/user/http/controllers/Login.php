<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Exception;
use App;



class Login extends Controller
{    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $loginService = App::make('LoginService');

        try{

            $token = $loginService->login($username, $password);

            if (!$token) {
            // REVIEW: ak je error tak použi throw new Exception() a porieši si error handling
            throw new Exception('user not found', $token);

            }

            return response()->json($token);

        } catch(Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

}
