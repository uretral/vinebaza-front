<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class LocationData extends Data
{
    public function __construct(
        public ?bool $latitude,
        public ?bool $longitude,
    )
    {
    }
}
