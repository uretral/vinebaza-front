<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class RanksCollectionData extends Data
{
    public function __construct(
        public ?RankData $country,
        public ?RankData $global,
        public ?RankData $region,
        public ?RankData $wine_type,
        public ?RankData $winery,
    )
    {
    }
}
