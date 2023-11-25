<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class CurrencyData extends Data
{
    public function __construct(
        public ?string $country_code,
        public ?string $prefix,
        public ?string $name,
        public ?string $code,
        public ?string $suffix
    )
    {
    }
}
