<?php

use function React\Promise\all;
    
    Route::post('/logs/create', function() {

        $data = Input::only(['arrival_time', 'name', 'delay']);
        $log = new AppLogger\Logger\Models\Log();
        $log->fill($data);
        $log->save();

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
    
?>