<?php

namespace Clevyr\LaravelGeocoder\Traits;

use Clevyr\LaravelGeocoder\LaravelGeocoder;

trait IsGeocodable {

    public function getLatAndLong() {
        if (
            $this->address_line_1 == null ||
            $this->city == null ||
            $this->state == null ||
            $this->postal_code == null
        ) {
            return null;
        }

        return LaravelGeocoder::GetLatLngFromAddress(
            $this->address_line_1,
            $this->address_line_2,
            $this->city,
            $this->state,
            $this->postal_code,
        );
    }

    public function addressIsDirty() {
        return $this->isDirty('address_line_1') ||
            $this->isDirty('address_line_2') ||
            $this->isDirty('city') ||
            $this->isDirty('state') ||
            $this->isDirty('postal_code');
    }

}
