<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;
use Illuminate\Http\Request;


class GetLog extends Controller
{
    // REVIEW - tento názov je trochu mätúci, pretože tu získavaš logs, nie logger, takže by som to nazval skôr "getLogs"
    public function getLogger()
    {
        $logs = Log::all();

        return response()->json($logs); // REVIEW - "return response()->json($logs)" je to isté ako "return $logs;", takže tak to môžeš trochu skrátit
    }

    // REVIEW - Tu je názov taktiež trochu divný, pretože "getName" by znamenalo že získavaš meno, lenže ty získavaš log na základe mena, čiže názov by mal byť skôr "getLogByName" alebo iba "getLog"
    public function getName(Request $request)
    {
        // REVIEW - globálne v celkom projekte zvláštne získavaš veci z requestu, z funkcie môžeš odstrániť "Request $request" a namiesto "$request->input('name')" môžeš použiť iba "input('name')
        $name = $request->input('name');
        // REVIEW - a zároveň tu by som trochu iným spôsobom poriešil vracanie týchto časov. Využil by som funkciu ->pluck(), v Laravel docs nájdeš ako sa to používa. čiže budeš mať Log::where(...)->get()->pluck(...);
        $log = Log::where('name', $name)->get(['arrival_time']);

        return response()->json($log);
    }
}
