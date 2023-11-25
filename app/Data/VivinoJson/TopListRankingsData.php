<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class TopListRankingsData extends Data
{
    public function __construct(
        public ?string      $description,
        public ?int         $previous_rank,
        public ?int         $rank,
        public ?TopListData $top_list,
    )
    {
    }
}
