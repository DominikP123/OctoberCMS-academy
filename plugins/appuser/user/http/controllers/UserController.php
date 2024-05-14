<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppUser\User\Classes\AuthService;
use Exception;


class UserController extends Controller
{       
    public function user(Request $request)
    {
        $token = $request->input('token');

        $authService = new AuthService();
        $user = $authService->getUser($token);

        try{
            if (!$user) {
    
                throw new Exception('user not found');
            }

            return response()->json($user);

        } catch(Exception $e) {

            throw new Exception('user not found');

        }
    }
}
