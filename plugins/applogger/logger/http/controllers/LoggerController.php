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

    public function getLogByName()
    {
        $name = input('name');
        // REVIEW - a zároveň tu by som trochu iným spôsobom poriešil vracanie týchto časov. Využil by som funkciu ->pluck(), v Laravel docs nájdeš ako sa to používa. čiže budeš mať Log::where(...)->get()->pluck(...);
        $log = Log::where('name', $name)->get(['arrival_time']);

        return $log;
    }
}
