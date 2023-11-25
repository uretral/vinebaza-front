<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class StatisticsWineData extends Data
{
    public function __construct(
        public ?int    $labels_count,
        public ?float  $ratings_average,
        public ?int    $ratings_count,
        public ?int    $reviews_count,
        public ?int    $vintages_count,
        public ?int    $wines_count,
        public ?string $status,
    )
    {
    }
}
