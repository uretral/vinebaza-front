<?php

namespace App\Data\VivinoJson;

use App\Data\VivinoJson\Casts\ValueIdCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class GrapeData extends Data
{
    public function __construct(
        public int             $id,
        public ?string         $name,
        public ?string         $seo_name,
        public ?string         $description, // text
        public ?bool           $has_detailed_info,
        public ?int            $parent_grape_id,
        #[DataCollectionOf(GrapeAliasData::class)]
        public ?DataCollection $aliases,
        public ?array          $originating_grapes,
        public ?string         $flavor_profile,
        public ?int            $color,
        public ?int            $acidity,
        public ?int            $body,
        public ?int            $wines_count,
        public ?string         $acidity_description,
        public ?string         $body_description, // text
        #[MapInputName('main_region')]
        #[WithCast(ValueIdCast::class)]
        public ?int            $main_region_id,
        public ?RegionData     $main_region,
        public ?string         $country_code,
        #[DataCollectionOf(GrapeTopTypeData::class)]
        public ?DataCollection $top_types,
        #[DataCollectionOf(GrapeTopCountriesOfUseData::class)]
        public ?DataCollection $top_countries_of_use,
    )
    {
    }
}
