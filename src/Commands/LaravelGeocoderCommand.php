<?php

namespace Clevyr\LaravelGeocoder\Commands;

use Illuminate\Console\Command;

class LaravelGeocoderCommand extends Command
{
    public $signature = 'laravel-geocoder';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
