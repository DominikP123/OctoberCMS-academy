<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;
use Illuminate\Http\Request;


class GetLog extends Controller
{
    public function getLogger()
    {
        $logs = Log::all();

        return response()->json($logs);
    }

    public function getName(Request $request)
    {
        $name = $request->input('name');
        $log = Log::where('name', $name)->get(['arrival_time']);

        return response()->json($log);
    }
}
