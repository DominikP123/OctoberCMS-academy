<?php namespace AppUser\User\http\controllers;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Exception;
use App;
use AppUser\User\Classes\LogOutService; // REVIEW - unused

class LogOut extends Controller
{    
    public function logOut(Request $request)
    {
        $logOutService = App::make('LogOutService'); // REVIEW - to isté čo som písal v Login.php
        $token = $request->input('token');

        try{
            $user = $logOutService->logOut($token);
            if (!$user) { 

                throw new Exception('user not found');

            }     
            
        } catch(Exception $e){ // REVIEW - medzeri

            return response()->json(['error' => 'Internal server error'], 500); // REVIEW - throw new Exception(...)

        }
    }
}
