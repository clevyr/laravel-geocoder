<?php

namespace Clevyr\LaravelGeocoder\GeoAdapters;

use Clevyr\LaravelGeocoder\Contracts\GeoAdapter;

class Mapbox implements GeoAdapter
{
    public function getLatLngFromAddress(string $searchString)
    {
        throw new \Exception('Not implemented for ' . self::class);
    }
}
