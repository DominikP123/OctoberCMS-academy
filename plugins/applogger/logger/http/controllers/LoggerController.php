<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use AppLogger\Logger\Models\Log;

class LoggerController extends Controller
{
    public function createLog()
    {
        $data = input(['user_id', 'arrival_time', 'name', 'delay']);
        /* REVIEW Toto sa dá ešte viac zjednodušiť, tu vlastne vyťahuješ nejaké údaje z requestu, čiže z post(), a následne ich filluješ do logu
        namiesto toho že to najprv uložíš do $data môžeš do fill() metódy rovno dať post() a to ti vyplní tie údaje ktoré sú tam dostupné */

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
        /* REVIEW Opäť pozor na to ako pomenúvavaš variables, tu vlastne získavaš a nakoniec vraciaš nejaké časy príchodov, čiže tu moc nesedí meno $log */

        return $log;
    }
}
