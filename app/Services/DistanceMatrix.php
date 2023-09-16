<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class DistanceMatrix {

    public function getDistanceData($origin,$destination){
        $response = Http::get(config('services.gmap.distance_matrix_url'), [
            'origins'       => $origin,
            'destinations'  => $destination,
            'key'           => config('services.gmap.api_key')
        ]);

        return json_decode($response,true);
    }

}