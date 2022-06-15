# Laravel Geocoder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/clevyr/laravel-geocoder.svg?style=flat-square)](https://packagist.org/packages/clevyr/laravel-geocoder)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/clevyr/laravel-geocoder/run-tests?label=tests)](https://github.com/clevyr/laravel-geocoder/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/clevyr/laravel-geocoder/Check%20&%20fix%20styling?label=code%20style)](https://github.com/clevyr/laravel-geocoder/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/clevyr/laravel-geocoder.svg?style=flat-square)](https://packagist.org/packages/clevyr/laravel-geocoder)

Handles geocoding an address into lat/lng based on cloud providers.

**Note:** Currently only supports using **Google** as a Geocoding provider.
As we prioritize it, we will implement MapBox as well.

## Installation

You can install the package via composer:

```bash
composer require clevyr/laravel-geocoder
```

Next, publish the plugin assets:

```bash
php artisan vendor:publish --provider="Clevyr\LaravelGeocoder\LaravelGeocoderServiceProvider"
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

## Set up Google Geocoding

First, you need to [set up a Google Geocoding API Key](https://developers.google.com/maps/documentation/geocoding/get-api-key#creating-api-keys)

Then, you will need to set the following ENV variable in your
Laravel application:

```
GOOGLE_CLOUD_API_KEY=
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

Alternatively, you can include the `Geocodable` trait in your Laravel Eloquent model
to get some nice geocoding instance methods:

```php
use Clevyr\LaravelGeocoder\Traits\Geocodable;

class MyModel extends Model
{
    use Geocodable;
}

$model = MyModel::find(1);
$coords = $model->getLatAndLong();
````

### Modifying the Model Geolocation Fields

By default, when you use the `Geocodable` trait, Laravel Geocoder will default
to using the following fields on your model:

* `address_line_1` (Required)
* `address_line_2`
* `city` (Required)
* `state` (Required)
* `postal_code` (Required)
* `country` (Defaults to 'US')

However, you can modify these fields on a per-model basis using the following
getter functions in your model:

```php
    // Override the postal_code property with something specific to this model
    public function getGeocoderPostalCodeAttribute()
    {
        return 'zip';
    }
```

This would assume that there is a `zip` field on this model, which will then be
used for this model's geolocation. Here are the full list of getter functions
that you can override:

```php
public function getGeocoderAddressLine1Attribute();
public function getGeocoderAddressLine2Attribute();
public function getGeocoderCityAttribute();
public function getGeocoderStateAttribute();
public function getGeocoderPostalCodeAttribute();
public function getGeocoderCountryAttribute();
```

## Testing

```bash
composer test
```

## Linting

```bash
composer analyse
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
