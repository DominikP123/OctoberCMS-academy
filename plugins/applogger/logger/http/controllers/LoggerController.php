<?php namespace AppLogger\Logger\Http\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use AppLogger\Logger\Models\Log;
use AppUser\User\Models\User; // REVIEW - Ak si všimneš takýto nevyužitý class/model/serice... tak ho vymaž

class LoggerController extends Controller
{
    // REVIEW - Taktiež by som lepšie nazval funkciu podľa toho čo robí. Tu vytváraš nový log, takže názov "createLog" je trefnejší ako "logger"
    public function logger(Request $request)
    {
        // REVIEW - Tu taktiež nepotrebuješ "Request $request" v parametroch, môžeš ich dať preč a použiť input()
        $data = $request->only(['user_id', 'arrival_time', 'name', 'delay']);

        $log = new Log();
        $log->fill($data);
       
        $log->save();

        return response()->json($log);
    }
}
