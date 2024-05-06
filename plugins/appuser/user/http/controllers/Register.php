<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Exception;
use Illuminate\Http\Request;
use App;

class Register extends Controller
{
    public function register(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $registerService = App::make('RegisterService');

        try{

            $token = $registerService->register($username, $password);

            if (!$token) {
                // REVIEW: ak je error tak použi throw new Exception() a porieši si error handling
                throw new Exception('user not found', $token);
    
            }

            return response()->json($token, 201);

        }catch(Exception $e){

            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
