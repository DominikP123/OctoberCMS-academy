<?php namespace AppUser\User\http\controllers;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use Hash;
use Illuminate\Support\Carbon;


class TestController extends Controller
{
    public function register(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = new User;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->token = Str::random(20);
        $user->delay = false;
        $user->login_time = date('Y-m-d H:i:s');
        $user->save();

        return response()->json(['token' => $user->token], 201);
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {

            $user->login_time = Carbon::now()->format('Y-m-d H:i:s');

            $user->save();

            $logData = ['user_id'=>$user->id, 'arrival_time'=>$user->login_time, 'name'=>$user->username, 'delay' => false];

            $log = new Log();
            $log->fill($logData);

            $log->save();
            
            return response()->json(['token' => $user->token]);
            
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

}
