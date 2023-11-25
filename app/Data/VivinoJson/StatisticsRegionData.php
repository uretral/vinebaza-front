<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class StatisticsRegionData extends Data
{
    public function __construct(
        public ?int $wines_count,
        public ?int $wineries_count,
        public ?int $sub_regions_count,
        public ?int $parent_regions_count
    )
    {
    }
}
