<?php

namespace App\Data\VivinoJson\Info\Vintage;

use Spatie\LaravelData\Data;

class StatisticsData extends Data
{
    public function __construct(
      public ?int $labels_count,
      public ?int $ratings_average,
      public ?int $ratings_count,
      public ?int $reviews_count,
      public ?string $status,
    ) {}
}
