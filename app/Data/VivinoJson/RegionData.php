<?php

namespace App\Data\VivinoJson;

use App\Data\VivinoJson\Casts\CountryCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class RegionData extends Data
{
    public function __construct(
        public int                   $id,
        public ?string               $name,
        public ?string               $name_en,
        public ?string               $seo_name,

        #[MapInputName('country')]
        #[WithCast(CountryCast::class)]
        public ?string               $country_code,

        public ?CountryData          $country,
        public ?int                  $parent_id,
        public ?BackgroundImageData  $background_image,
        public ?StatisticsRegionData $statistics,
        public ?array                $parent_regions,
        #[DataCollectionOf(GrapeData::class)]
        public ?DataCollection       $grapes,
        #[MapInputName('updated_at')]
        public ?string               $updated,
    )
    {
    }
}
