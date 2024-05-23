<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;

class LoggerController extends Controller
{
    public function createLog()
    {
        $log = new Log();
        $log->fill(post());
        $log->save();

        return $log;
    }

    public function getLogs()
    {
        $logs = Log::all();

        return $logs;
    }

    public function getArrivalsTime($name)
    {
        $time = Log::where('name', $name)->get()->pluck('arrival_time');
        
        return $time;
    }
}
