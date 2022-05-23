<?php

namespace Clevyr\LaravelGeocoder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Clevyr\LaravelGeocoder\Commands\LaravelGeocoderCommand;

class LaravelGeocoderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-geocoder')
            ->hasConfigFile();
    }
}
