<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;
use Exception;

class LoggerController extends Controller
{
    public function createLog()
    {
        #$data = post();
        /* REVIEW Toto sa dá ešte viac zjednodušiť, tu vlastne vyťahuješ nejaké údaje z requestu, čiže z post(), a následne ich filluješ do logu
        namiesto toho že to najprv uložíš do $data môžeš do fill() metódy rovno dať post() a to ti vyplní tie údaje ktoré sú tam dostupné */
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
