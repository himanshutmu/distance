<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DistanceMatrix;
use Exception;
use Log;
use App\Traits\DistanceTrait;
use App\Models\Address;

class DistanceController extends Controller
{
    use DistanceTrait;

    protected $distanceMatrix;

    public function __construct(DistanceMatrix $distanceMatrix) {
        $this->distanceMatrix = $distanceMatrix;
    }

    public function calculateDistance() {
        try {
            $origin = Address::getOrigin();
            $destinations = Address::getDestinations();
            $sortedData = $this->getSortedData($origin, $destinations);
            $csvData = $this->getCsvData($sortedData);
            return $this->createCsv($csvData);
        } catch (Exception $e) {
            Log::error($e);
            return $e;
        }
    }

    
}
