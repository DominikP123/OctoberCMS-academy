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

            return response()->json([ // REVIEW - response()->json([...]) je zvytočne komplikované, keď dáš return [...] tak sa to aj tak vráti ako json
                'username' => $user->username,
                'delay' => $user->delay,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,

            ]);
            
        } catch(Exception){
            throw new Exception('user not found');
            /* REVIEW - Tu sa ti 2-krát opakuje 'user not found'. Ak chytáš error cez catch() mal by si skôr získať message erroru ktorý sa chytil.
            To vieš urobiť tak že do catch() parametrov dáš catch(Exception $e), a následne získaš z tohto $e jeho message - ->getMessage()
            Takto to sprav globálne na projekte nech sa ti neopakujú error messages */
        }
    }
}