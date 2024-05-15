<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Exception;

class LogOutService extends Controller
{
    public function logOut($token)
    {
        try{
            $user = User::where('token', $token)->first();

            if (!$user) {
                throw new Exception('user not found');
            }     

            $user->token = null;
            $user->save();

            return $token;

        } catch(Exception){
            throw new Exception('user not found');
        }
    }
}