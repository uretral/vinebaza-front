<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class StatisticsStyleData extends Data
{
    public function __construct(
        public ?int $aggregated_wines_count,
        public ?int $wines_count,
    )
    {
    }
}
