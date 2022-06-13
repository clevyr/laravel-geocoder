# Laravel Geocoder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/clevyr/laravel-geocoder.svg?style=flat-square)](https://packagist.org/packages/clevyr/laravel-geocoder)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/clevyr/laravel-geocoder/run-tests?label=tests)](https://github.com/clevyr/laravel-geocoder/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/clevyr/laravel-geocoder/Check%20&%20fix%20styling?label=code%20style)](https://github.com/clevyr/laravel-geocoder/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/clevyr/laravel-geocoder.svg?style=flat-square)](https://packagist.org/packages/clevyr/laravel-geocoder)

 Handles geocoding an address into lat/lng with multiple providers

## Installation

You can install the package via composer:

```bash
composer require clevyr/laravel-geocoder
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-geocoder-config"
```

This is the contents of the published config file (without descriptive comments):

```php
return [
    'adapter' => 'google',
    'test-adapter' => 'test',
    'test' => [
        'lat' => 35.4771302,
        'lng' => -97.5283204,
    ],
];
```

## Usage

```php
use Clevyr\LaravelGeocoder;

$coords = LaravelGeocoder::GetLatLngFromAddress(
    '123 Test Ln',
    null,
    'New York',
    'NY',
    '10001',
);

echo $coords;

// [
//     'lat' => 35.4771302,
//     'lng' => -97.5283204,
// ]
```

Alternatively, you can include the `Geocodable` trait in your model to get some
nice geocoding instance methods:

```php
class GeocoderFake extends Model
{
    use Geocodable;
}
````

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Aaron Krauss](https://github.com/thecodeboss)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
