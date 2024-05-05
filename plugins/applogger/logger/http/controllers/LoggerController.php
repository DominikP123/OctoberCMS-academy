<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use AppUser\User\Models\User;

class LoggerController extends Controller
{
    public function logger(Request $request)
    {
        $data = $request->only(['user_id', 'arrival_time', 'name', 'delay']);

        $log = new Log();
        $log->fill($data);
       
        $log->save();

        return response()->json($log);
    }
}
