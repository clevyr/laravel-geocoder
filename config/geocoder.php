<?php
// config for Clevyr/LaravelGeocoder

return [

    /*
    |--------------------------------------------------------------------------
    | Geocoding Adapter
    |--------------------------------------------------------------------------
    |
    | This value is the the adapter that you wish to use for geocoding.
    | Currently it only supports 'google' and 'testing'
    | TODO: Add full support for 'mapbox' adapter
    |
    */

    'adapter' => 'google',

    /*
    |--------------------------------------------------------------------------
    | Test Lat / Lng
    |--------------------------------------------------------------------------
    |
    | These are the lat/lngs that will get used with the 'test' adapter.
    | Currently they default to Clevyr's Lat/Lng in
    | Oklahoma City, OK, United States.
    */

    'test' => [
        'lat' => 35.4771302,
        'lng' => -97.5283204,
    ],
];
