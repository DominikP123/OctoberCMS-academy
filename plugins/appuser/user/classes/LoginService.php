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

                if($user->token == null){

                    $user->token = Str::random(20);

                }
                $user->login_time = Carbon::now()->format('Y-m-d H:i:s');

                $user->save();

                $logData = ['user_id'=>$user->id, 'arrival_time'=>$user->login_time, 'name'=>$user->username, 'delay' => false];

                $log = new Log();
                $log->fill($logData);

                $log->save();
                
                return $user->token;
                
            }

            return response()->json(['error' => 'Unauthorized'], 401);

        } catch (Exception $e){

            return response()->json(['error' => 'Internal server error'], 500);

        }
    }
}