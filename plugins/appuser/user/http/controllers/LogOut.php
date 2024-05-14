<?php namespace AppUser\User\http\controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Exception;
use AppUser\User\Classes\LogOutService;


class LogOut extends Controller
{    
    public function logOut(Request $request)
    {
        $token = $request->input('token');

        $logOutService = new LogOutService();
        $logOutService->logOut($token);

        try{
            $user = $logOutService->logOut($token);
            if (!$user) { 

                throw new Exception('user not found');

            }     
            
        } catch(Exception){ // REVIEW - medzery

            throw new Exception('user not found');
            
        }
    }
}
