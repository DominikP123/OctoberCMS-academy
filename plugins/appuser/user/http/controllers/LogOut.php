<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Exception;
use AppUser\User\Classes\LogOutService;

class LogOut extends Controller
{    
    public function logOut()
    {
        $token = input('token');

        $logOutService = new LogOutService();
        $user = $logOutService->logOut($token);

        try{
            throw new Exception('nejde');
        
            if (!$user) {
                throw new Exception('user not found');
            }     

            return response()->json('User has been log out');
            
        } catch(Exception){
            throw new Exception('user not found');
        }
    }
}
