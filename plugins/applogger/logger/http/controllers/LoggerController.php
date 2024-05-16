<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;

class LoggerController extends Controller
{
    public function createLog()
    {
        $data = input(['user_id', 'arrival_time', 'name', 'delay']);

        $log = new Log();
        $log->fill($data);
        $log->save();

        return $log;
    }

    public function getLogs()
    {
        $logs = Log::all();

        return $logs;
    }

    public function getLogByName($name)
    {
        $log = Log::where('name', $name)->get()->pluck('arrival_time');

        return $log;
    }
}
