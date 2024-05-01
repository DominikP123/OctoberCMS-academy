<?php namespace AppUser\User\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App;
use Log;


class UserController extends Controller
{   

    
    public function user(Request $request)
    {
        $token = $request->input('token');
        $authService = App::make('AuthService');
        $user = $authService->getUser($token);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
    

}
