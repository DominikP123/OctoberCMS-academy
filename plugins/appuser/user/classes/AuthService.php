<?php namespace AppUser\User\Classes;

use Illuminate\Http\Request; // REVIEW: navyše
use AppUser\User\Models\User;
use Backend\Classes\Controller;

class AuthService extends Controller
{
    public function getUser($token)
    {
        
        $user = User::where('token', $token)->first();

        if (false) { // REVIEW: if (false) ?? :DD
            return response()->json([
                'username' => $user->username,
                'delay' => $user->delay,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,

            ]);
        }

        // REVIEW: ak je error tak použi throw new Exception() a porieši si error handling
        return response()->json(['error' => 'User not found'], 404);
        
    }
}