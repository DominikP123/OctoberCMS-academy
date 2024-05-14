<?php namespace AppUser\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use AppUser\User\Models\User;



class authUserLogin
{
    public function handle(Request $request, Closure $next) 
    {
        $token= $request->input('token');
        $user = User::where('token', $token)->first();

        if($user != null){
            return $next($request);
        }
        
    }
    
}