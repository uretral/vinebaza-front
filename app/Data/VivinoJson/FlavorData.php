<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class FlavorData extends Data
{
    public function __construct(
        public ?string $group,
        #[DataCollectionOf(KeywordsData::class)]
        public ?DataCollection $primary_keywords,
        #[DataCollectionOf(KeywordsData::class)]
        public ?DataCollection $secondary_keywords,
        public ?StatsData $stats,

    )
    {
    }
}
