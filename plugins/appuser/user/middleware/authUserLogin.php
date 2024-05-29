<?php namespace AppUser\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use AppUser\User\Models\User;

class authUserLogin
{
    public function handle(Request $request, Closure $next) 
    {
        $token = request()->bearerToken();
        $user = User::where('token', $token)->first();

        if($user != null){
            return $next($request);
        }
        // REVIEW Bolo by dobré hodiť nejaký error ak zlyhá autentifikácia
    }
    
}