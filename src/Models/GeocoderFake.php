<?php

namespace Clevyr\LaravelGeocoder\Models;

use Clevyr\LaravelGeocoder\Traits\Geocodable;
use Illuminate\Database\Eloquent\Model;

class GeocoderFake extends Model
{
    use Geocodable;

    protected $guarded = [];

    public static function makeForTest() {
        return self::make([
            'address_line_1' => '123 Test Ln',
            'address_line_2' => null,
            'city' => 'New York',
            'state' => 'NY',
            'postal_code' => '10001',
        ]);
    }
}
