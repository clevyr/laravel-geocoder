<?php

namespace Clevyr\LaravelGeocoder\GeoAdapters;

use Clevyr\LaravelGeocoder\Contracts\GeoAdapter;

class Test implements GeoAdapter {

    public const LAT = 35.4771302;
    public const LNG = -97.5283204;

    public function getLatLngFromAddress(string $searchString) {
        $lat = config('geocoding.test.lat') ?? self::LAT;
        $lng = config('geocoding.test.lng') ?? self::LNG;

        // Return Clevyr's Lat/Lng
        return [
            'lat' => $lat,
            'lng' => $lng,
        ];
    }
}
