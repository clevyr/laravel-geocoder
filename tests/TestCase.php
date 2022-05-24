<?php

namespace Clevyr\LaravelGeocoder\Tests;

use Clevyr\LaravelGeocoder\LaravelGeocoder;
use Clevyr\LaravelGeocoder\LaravelGeocoderServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Reset the adapter between test runs
        LaravelGeocoder::$adapter = null;

        // Factory::guessFactoryNamesUsing(
        //     fn (string $modelName) => 'Clevyr\\LaravelGeocoder\\Database\\Factories\\'.class_basename($modelName).'Factory'
        // );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelGeocoderServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-geocoder_table.php.stub';
        $migration->up();
        */
    }
}
