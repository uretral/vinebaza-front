<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class BaselineStructureData extends Data
{
    public function __construct(
        public null|int|float    $acidity,
        public null|int|float $fizziness,
        public null|int|float    $intensity,
        public null|int|float  $sweetness,
        public null|int|float    $tannin
    )
    {
    }
}
