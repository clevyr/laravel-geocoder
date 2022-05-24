<?php

namespace Clevyr\LaravelGeocoder\Models;

use Clevyr\LaravelGeocoder\Traits\Geocodable;
use Illuminate\Database\Eloquent\Model;

class GeocoderFake extends Model
{
    use Geocodable;

    protected $guarded = [];

    public static function makeForTest()
    {
        return self::make([
            'name' => 'Clevyr',
            'address_line_1' => '912 N Classen Blvd',
            'address_line_2' => null,
            'city' => 'Oklahoma City',
            'state' => 'OK',
            'zip' => '73106',
        ]);
    }

    // Override the postal_code property with something specific to this model
    public function getGeocoderPostalCodeAttribute()
    {
        return 'zip';
    }
}
