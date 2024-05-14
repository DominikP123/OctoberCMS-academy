<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Exception;

class AuthService extends Controller
{
    public function getUser($token)
    {
        try{
            $user = User::where('token', $token)->first();

            if (!$user) {
                throw new Exception('user not found');
            } 

            return response()->json([
                'username' => $user->username,
                'delay' => $user->delay,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,

            ]);
            
        } catch(Exception){
            throw new Exception('user not found');
        }
    }
}