<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Exception;
use Illuminate\Support\Str;
use AppLogger\Logger\Models\Log;
use Hash;
use Illuminate\Support\Carbon;

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

        } catch(Exception $e){

            return response()->json(['error' => 'Internal server error'], 500);

        }
    }
}