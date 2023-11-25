<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class UserStatisticsData extends Data
{
    public function __construct(
        public ?int $user_id,
        public ?int $followers_count,
        public ?int $followings_count,
        public ?int $purchase_order_count,
        public ?int $ratings_count,
        public ?int $ratings_sum,
        public ?int $reviews_count,
    )
    {
    }
}
