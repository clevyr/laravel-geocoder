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

it('Fails to geolocates a model with a null address_line_1', function () {
    $model = GeocoderFake::makeForTest();
    $model->address_line_1 = null;

    $coords = $model->getLatAndLong();

    expect($coords)->toBe(null);
});

it('Fails to geolocates a model with a null city', function () {
    $model = GeocoderFake::makeForTest();
    $model->city = null;

    $coords = $model->getLatAndLong();

    expect($coords)->toBe(null);
});

it('Fails to geolocates a model with a null state', function () {
    $model = GeocoderFake::makeForTest();
    $model->state = null;

    $coords = $model->getLatAndLong();

    expect($coords)->toBe(null);
});

it('Fails to geolocates a model with a null zip', function () {
    $model = GeocoderFake::makeForTest();
    $model->zip = null;

    $coords = $model->getLatAndLong();

    expect($coords)->toBe(null);
});

it('Model address is not dirty on name change', function () {
    $model = GeocoderFake::make([
        'name' => 'Clevyr',
    ]);

    expect($model->isDirty())->toBe(true);
    expect($model->addressIsDirty())->toBe(false);
});

it('Model address is dirty on address_line_1 change', function () {
    $model = GeocoderFake::make([
        'address_line_1' => '123 Foo Ln',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});

it('Model address is dirty on address_line_2 change', function () {
    $model = GeocoderFake::make([
        'address_line_2' => 'Suite 2000',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});

it('Model address is dirty on city change', function () {
    $model = GeocoderFake::make([
        'city' => 'OKC',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});

it('Model address is dirty on state change', function () {
    $model = GeocoderFake::make([
        'state' => 'OK',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});

it('Model address is dirty on zip change', function () {
    $model = GeocoderFake::make([
        'zip' => '73106',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});

it('Model address is dirty on country change', function () {
    $model = GeocoderFake::make([
        'country' => 'CA',
    ]);

    expect($model->addressIsDirty())->toBe(true);
});
