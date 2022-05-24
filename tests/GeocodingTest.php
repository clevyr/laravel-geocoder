<?php

use Clevyr\LaravelGeocoder\LaravelGeocoder;
use Clevyr\LaravelGeocoder\Models\GeocoderFake;
use Illuminate\Support\Facades\Config;

it('Geolocates successfully', function () {
    $coords = LaravelGeocoder::GetLatLngFromAddress(
        '123 Test Ln',
        null,
        'New York',
        'NY',
        '10001',
    );

    expect($coords['lat'])->toBe(config('geocoder.test.lat'));
    expect($coords['lng'])->toBe(config('geocoder.test.lng'));
});

it('Throws an error with unsupported adapter', function () {
    Config::set('geocoder.test-adapter', 'fake-adapter');

    LaravelGeocoder::GetLatLngFromAddress(
        '123 Test Ln',
        null,
        'New York',
        'NY',
        '10001',
    );
})->throws(Exception::class);

it('Geolocates a model with the IsGeocodable trait', function () {
    $model = GeocoderFake::makeForTest();

    $coords = $model->getLatAndLong();

    expect($coords['lat'])->toBe(config('geocoder.test.lat'));
    expect($coords['lng'])->toBe(config('geocoder.test.lng'));
});
