<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class StatsData extends Data
{
    public function __construct(
        public ?int $count,
        public ?int $mentions_count,
        public ?int $score,
    )
    {
    }
}
