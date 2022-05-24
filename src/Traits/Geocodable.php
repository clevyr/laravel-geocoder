<?php

namespace Clevyr\LaravelGeocoder\Traits;

use Clevyr\LaravelGeocoder\LaravelGeocoder;

trait Geocodable
{
    public function getLatAndLong()
    {
        if (
            $this->{$this->geocoderAddressLine1} == null ||
            $this->{$this->geocoderCity} == null ||
            $this->{$this->geocoderState} == null ||
            $this->{$this->geocoderPostalCode} == null
        ) {
            return null;
        }

        return LaravelGeocoder::GetLatLngFromAddress(
            $this->{$this->geocoderAddressLine1},
            $this->{$this->geocoderAddressLine2},
            $this->{$this->geocoderCity},
            $this->{$this->geocoderState},
            $this->{$this->geocoderPostalCode},
            $this->{$this->geocoderCountry} ?? 'US',
        );
    }

    public function addressIsDirty()
    {
        return $this->isDirty($this->geocoderAddressLine1) ||
            $this->isDirty($this->geocoderAddressLine2) ||
            $this->isDirty($this->geocoderCity) ||
            $this->isDirty($this->geocoderState) ||
            $this->isDirty($this->geocoderPostalCode) ||
            $this->isDirty($this->geocoderCountry);
    }

    public function getGeocoderAddressLine1Attribute() {
        return 'address_line_1';
    }

    public function getGeocoderAddressLine2Attribute() {
        return 'address_line_2';
    }

    public function getGeocoderCityAttribute() {
        return 'city';
    }

    public function getGeocoderStateAttribute() {
        return 'state';
    }

    public function getGeocoderPostalCodeAttribute() {
        return 'postal_code';
    }

    public function getGeocoderCountryAttribute() {
        return 'country';
    }
}
