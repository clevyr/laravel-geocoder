<?php

namespace Clevyr\LaravelGeocoder\GeoAdapters;

use Clevyr\LaravelGeocoder\Contracts\GeoAdapter;

// See docs here:
// https://developers.google.com/maps/documentation/geocoding/start

class Google implements GeoAdapter
{
    public const OK = 'OK';
    public const GEOCODE_API_PREFIX = 'https://maps.googleapis.com/maps/api/geocode/json';

    public function getLatLngFromAddress(string $searchString)
    {
        //Send request and receive json data by address
        $geocodeFromLatLong = file_get_contents(
            self::GEOCODE_API_PREFIX
            . '?address='
            . $searchString
            . '&key=' . config('geocoder.api_keys.google')
        );

        $output = json_decode($geocodeFromLatLong);

        if ($output == null) {
            return null;
        }

        if ($output->status !== self::OK) {
            return null;
        }

        $coords = $output->results[0]->geometry->location;

        return [
            'lat' => $coords->lat,
            'lng' => $coords->lng,
        ];
    }
}
