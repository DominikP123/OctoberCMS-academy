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

            if (!$user) { // REVIEW - medzery

                throw new Exception('user not found');

            }     

            $user->token = null;
            $user->save();

        } catch(Exception $e){

            throw new Exception('user not found');
        }
    }
}