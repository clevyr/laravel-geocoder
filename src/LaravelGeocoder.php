<?php

namespace Clevyr\LaravelGeocoder;

use Illuminate\Support\Facades\App;

class UnsupportedAdapterError extends \Exception
{
}

class LaravelGeocoder
{
    private const GOOGLE = 'google';

    private const MAPBOX = 'mapbox';

    private const TEST = 'test';

    private const SUPPORTED_ADAPTERS = [
        self::GOOGLE,
        self::TEST,
    ];

    /**
     * The GeoAdapterInterface object
     *
     * @var mixed
     */
    public static $adapter;

    public static function GetLatLngFromAddress(
        string $address_line_1,
        $address_line_2, // Could be null
        string $city,
        string $state,
        string $postal_code,
        string $country = 'US',
    ) {
        if (! self::$adapter) {
            self::Init();
        }

        $searchString = self::GetFormattedSearchString(
            $address_line_1,
            $address_line_2,
            $city,
            $state,
            $postal_code,
            $country,
        );

        return self::$adapter->getLatLngFromAddress($searchString);
    }

    public static function GetFormattedSearchString(
        string $address_line_1,
        $address_line_2, // Could be null
        string $city,
        string $state,
        string $postal_code,
        string $country = 'US',
    ) {
        return str_replace(' ', '+', $address_line_1)
            .($address_line_2 == null ? '' : '+'.str_replace(' ', '+', $address_line_2))
            .',+'.str_replace(' ', '+', $city)
            .',+'.$state
            .',+'.str_replace(' ', '+', $postal_code)
            .',+'.$country;
    }

    private static function Init()
    {
        $adapter = App::environment() == 'testing' ? (
            config('geocoder.test-adapter')
        ) : (
            config('geocoder.adapter')
        );

        if (! in_array($adapter, self::SUPPORTED_ADAPTERS)) {
            self::ThrowUnsupportedAdapterError();
        }

        self::$adapter = self::GetAdapter($adapter);
    }

    private static function GetAdapter(string $adapter)
    {
        switch ($adapter) {
            case self::GOOGLE:
                return new GeoAdapters\Google();
            case self::MAPBOX:
                return new GeoAdapters\Mapbox();
            case self::TEST:
                return new GeoAdapters\Test();
            default:
                return null;
        }
    }

    private static function ThrowUnsupportedAdapterError()
    {
        throw new UnsupportedAdapterError(
            config('geocoder.adapter')
            .' is an unsupported geocoding adapter. Please select one of: '
            .implode(', ', self::SUPPORTED_ADAPTERS)
        );
    }
}
