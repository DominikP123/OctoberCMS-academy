<?php namespace AppUser\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use AppUser\User\Models\User;


// REVIEW: trochu vágne meno, špecifikoval by som podĽa toho čo to robí
class authUserLogin
{
    public function handle(Request $request, Closure $next) // REVIEW: podobnú logiku už máš inde
    {
        $token= $request->input('token');
        $user = User::where('token', $token)->first();

        if($user != null){
            return $next($request);
        }

        return redirect()->route('login');
        
    }
    
}