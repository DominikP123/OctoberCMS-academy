<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Support\Str;
use Hash;

class RegisterService extends Controller
{
    public function register($username, $password)
    {
        $user = new User;

        $user->username = $username;
        $user->password = Hash::make($password);
        $user->token = Str::random(20);
        $user->delay = false;
        $user->login_time = date('Y-m-d H:i:s');

        $user->save();

        return $user->token;
    }
    
}