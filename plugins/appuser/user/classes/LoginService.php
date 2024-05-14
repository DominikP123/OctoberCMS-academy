<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Exception;
use Illuminate\Support\Str;
use AppLogger\Logger\Models\Log;
use Hash;
use Illuminate\Support\Carbon;

class LoginService extends Controller
{
    public function login($username, $password)
    {   
        try{
            $user = User::where('username', $username)->first();

            if ($user && Hash::check($password, $user->password)) {

                if ($user->token == null){ // REVIEW - na viacerých miestach máš takéto zbytočné medzery :DD vyzerá to kúsok divne, skôr by som dal medzeru za tým if statementom
                    $user->token = Str::random(20); // REVIEW - táto logika na vytvorenie tokenu sa ti opakuje aj v RegisterService, možno by som to zjednotil do nejakého AuthService
                }

                $user->login_time = date('Y-m-d H:i:s'); // REVIEW - toto je asi len preferencia, ale kraršia verzia by bolo "date('Y-m-d H:i:s');"

                $user->save();

                $logData = [
                            'user_id' => $user->id, 
                            'arrival_time' => $user->login_time,
                            'name' => $user->username,
                            'delay' => false
                            ];

                $log = new Log();
                $log->fill($logData);

                $log->save();
                
                return $user->token;
            }

            throw new Exception('user not found', 401);

        } catch ( Exception ){ // REVIEW - zas ti medzery :,D

            throw new Exception('Internal server error', 500);
        }
    }
}