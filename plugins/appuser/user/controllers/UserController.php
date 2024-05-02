<?php namespace AppUser\User\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App;
use Log; // REVIEW: nepotrebuješ nič logovať

// REVIEW: tento controller by si nemal mať vo folderi controllers, lebo je rozdiel medzi october controllermi, a našimi http controllermi ktoré robia logiku requestov, radšej si sprav dolder http/controllers a tam to dávaj
class UserController extends Controller
{   

    
    public function user(Request $request)
    {
        $token = $request->input('token');
        $authService = App::make('AuthService');
        $user = $authService->getUser($token);

        if (!$user) {
            // REVIEW: ak je error tak použi throw new Exception() a porieši si error handling
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
    

}
