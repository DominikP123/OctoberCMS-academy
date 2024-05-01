<?php namespace AppUser\User\Controllers;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


use Hash;


class TestController extends Controller
{
    public function register(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = new User;
        $user->username = $username;
        $user->password = $password;
        $user->token = Str::random(20);
        $user->delay = false;
        $user->save();

        return response()->json(['token' => $user->token], 201);
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {

            return response()->json(['token' => $user->token]);
            
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

}
