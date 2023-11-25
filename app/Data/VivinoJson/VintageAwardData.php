<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class VintageAwardData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?int    $competition_id,
        public ?int    $vintage_id,
        public ?string $edition,
        public ?string $medal,
        public ?string $score,
        public ?string $trophy
    )
    {
    }
}
