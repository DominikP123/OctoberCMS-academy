<?php

// REVIEW: Toto si niekde predtým použil? či to tu nemá byť?
use function React\Promise\all;

// REVIEW: pre routes sa zvyčajne používa prefix api/v1, čiže request = host/api/v1/logs/create..., pozri si ako sa to používa v Laravel
// REVIEW: Funkcionalitu requestov by si mal mať upratanú v controlleroch, nemala by byť rovno v routes.php (je to aj v academy napísané)
// REVIEW: Toto máš tak zbytočne odsadené o 1 tab doprava
    Route::post('/logs/create', function() {
        // REVIEW: väčšinou sa používa post() funkcia, to ti vráti tak isto data
        $data = Input::only(['arrival_time', 'name', 'delay']);
        // REVIEW: Tu by som skôr vyššie zadefinoval use AppLogger\... a tu použil iba čisto Log()
        $log = new AppLogger\Logger\Models\Log();
        $log->fill($data);
        $log->save();

        // REVIEW: toto je už v podstate na tebe, ale používa sa aj response(), alebo môžeš vracať rovno array ktorý máš v tejto Response::json funkcii
        return Response::json(['success' => true, 'id' => $log->id]);
    });

    Route::get('/logs', function() {

        $logs = \AppLogger\Logger\Models\Log::all();

        return Response::json($logs);
    });

    Route::get('/logs/{name}', function($name) {

        $log = \AppLogger\Logger\Models\Log::where('name', $name)->get();

        return Response::json($log);

    });

// REVIEW: toto tu môže byť ale nemusí
?>