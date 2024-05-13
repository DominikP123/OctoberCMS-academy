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
        $loginService = App::make('LoginService'); // REVIEW - takýto spôsob volania classy je komplikovaný, normálne si ju zadefinuj cez "use" a potom volaj login ako static funkciu

        try{

            $token = $loginService->login($username, $password);

            if (!$token) { // REVIEW - odsadenie a medzera
            throw new Exception('user not found', $token);

            }

            return response()->json($token);

        } catch(Exception $e) { // REVIEW - medzery

            return response()->json(['error' => $e->getMessage()], 500); // REVIEW - throw new Exception(...)

        }
    }

}
