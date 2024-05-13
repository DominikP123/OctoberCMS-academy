<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App;
use Exception;

class UserController extends Controller
{       
    public function user(Request $request)
    {
        $token = $request->input('token');
        $authService = App::make('AuthService');
        $user = $authService->getUser($token);

        try{
            if (!$user) {
            // REVIEW: ak je error tak použi throw new Exception() a porieši si error handling
            throw new Exception('user not found');

            }

            return response()->json($user);

        } catch(Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
