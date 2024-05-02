<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use Request;
use AppLogger\Logger\Models\Log;

class LoggerController extends Controller
{
    public function logger()
    {
        $data = post(['arrival_time', 'name', 'delay']);
        $log = new Log();
        $log->fill($data);
        $log->save();

        return response()->json($log);
    }
}
