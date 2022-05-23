<?php

use Clevyr\LaravelGeocoder\LaravelGeocoder;
use Clevyr\LaravelGeocoder\UnsupportedAdapterError;
use Illuminate\Support\Facades\Config;

it('Geolocates successfully', function () {
    $coords = LaravelGeocoder::GetLatLngFromAddress(
        '123 Test Ln',
        null,
        'New York',
        'NY',
        '10001',
    );

    // If it got here, it initialized successfully
    expect($coords['lat'])->toBe(config('geocoder.test.lat'));
    expect($coords['lng'])->toBe(config('geocoder.test.lng'));
});

// it('Throws an error with unsupported adapter', function () {
//     Config::set('geocoder.adapter', 'fake-adapter');
//
//     LaravelGeocoder::GetLatLngFromAddress(
//         '123 Test Ln',
//         null,
//         'New York',
//         'NY',
//         '10001',
//     );
// })->throws(Exception::class);
