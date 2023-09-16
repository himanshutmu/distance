<?php

namespace App\Traits;
use App\Models\Address;
use File;
use Response;

trait DistanceTrait { 

    public function getOrigin() {
        return Address::where('is_headquarter',1)->value('address');
    }

    public function getDestinations() {
        return Address::where('is_headquarter', 0)->pluck('address')->toArray();
    }

    public function getSortedData($origin, $destinations) {
        foreach($destinations as $destination) {
            $data = $this->distanceMatrix->getDistanceData($origin, $destination);
            $distanceValue = $data['rows'][0]['elements'][0]['distance']['value'] ?? 0;
            $sortedData[] = [
                'Distance' => $distanceValue,
                'Name' => $this->getNameFromAddress($destination),
                'Address' => $destination
            ]; 
        }

        usort($sortedData, function($a, $b) {
            return $a['Distance'] <=> $b['Distance'];
        });

        return $sortedData;
    }

    public function getCsvData($sortedData)  {
        foreach($sortedData as $data) {
            if($data['Distance'] > 0) {
                $distanceData[] = [
                    'Distance'   => $this->getFormattedDistance($data['Distance']),
                    'Name'       => $data['Name'],
                    'Address'    => $data['Address']    
                ];
            } else {
                $unavailableDistanceData[] = [
                    'Distance'   => $this->getFormattedDistance($data['Distance']),
                    'Name'       => $data['Name'],
                    'Address'    => $data['Address']    
                ];
            }
        }
        
        return array_merge($distanceData,$unavailableDistanceData);
    }

    public function getNameFromAddress($destination) {
        $parts = explode('-',$destination);
        return $parts[0];
    }

    public function getFormattedDistance($distance) {
        return $distance > 0 ? number_format(($distance/1000),2). ' km' : 'Address Data Not Found';
    }

    function createCsv($csvData) {
        $headers = [
            'Content-Type' => 'text/csv'
        ];

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/distances.csv");
        $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "Sortnumber",
            "Distance",
            "Name",
            "Address"
        ]);

        foreach ($csvData as $key => $csvRow) {
            fputcsv($handle, [
                $key+1,
                $csvRow['Distance'],
                $csvRow['Name'],
                $csvRow['Address'],
            ]);
        }

        fclose($handle);

        return Response::download($filename, "distances.csv", $headers);
    }
}