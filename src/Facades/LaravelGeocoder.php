<?php

namespace Clevyr\LaravelGeocoder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Clevyr\LaravelGeocoder\LaravelGeocoder
 */
class LaravelGeocoder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-geocoder';
    }
}
