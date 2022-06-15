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
    | Geocoding API Keys
    |--------------------------------------------------------------------------
    |
    | Includes the API keys for the matching providers.
    | TODO: Add full support for 'mapbox' adapter
    |
    */
    'api_keys' => [
        'google' => env('GOOGLE_CLOUD_API_KEY'),
        'mapbox' => env('MAPBOX_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Testing Geocoding Adapter
    |--------------------------------------------------------------------------
    |
    | This value is the the adapter that you wish to use for geocoding while
    | in your test environment .
    | Supports the same options as 'adapter'
    | Note: Be hesitant to change this, lest you accidentally geocode during
    | your automated tests
    |
    */

    'test-adapter' => 'test',

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
