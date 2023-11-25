<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class StructureData extends Data
{
    public function __construct(
        public null|int|float $acidity,
        public null|int|float $fizziness,
        public null|int|float $intensity,
        public null|int|float $sweetness,
        public null|int|float $tannin,
        public ?int           $calculated_structure_count,
        public ?int           $user_structure_count,
    )
    {
    }
}
