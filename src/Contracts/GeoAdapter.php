<?php

namespace Clevyr\LaravelGeocoder\Contracts;

interface GeoAdapter {
    public function getLatLngFromAddress(string $searchString);
}
