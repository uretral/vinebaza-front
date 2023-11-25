<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CountryData extends Data
{
    public function __construct(
        public ?string         $code,
        public ?string         $name,
        public ?string         $native_name,
        public ?int            $regions_count,
        public ?string         $seo_name,
        public ?int            $users_count,
        public ?int            $wineries_count,
        public ?int            $wines_count,
        public ?CurrencyData   $currency,
        #[DataCollectionOf(GrapeData::class)]
        public ?DataCollection $most_used_grapes,


    )
    {
    }
}
