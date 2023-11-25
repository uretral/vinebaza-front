<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class ReviewActivityData extends Data
{
    public function __construct(
        public ?int $id,
        public ?ReviewActivityStatisticsData $statistics,
    )
    {
    }
}
