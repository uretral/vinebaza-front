<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class RankData extends Data
{
    public function __construct(
        public ?string $description,
        public ?int    $rank,
        public ?int    $total,
    )
    {
    }
}
