<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class ReviewActivityStatisticsData extends Data
{
    public function __construct(
        public ?int $review_id,
        public ?int $likes_count,
        public ?int $comments_count,

    )
    {
    }
}
