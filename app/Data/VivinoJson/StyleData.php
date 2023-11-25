<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StyleData extends Data
{
    public function __construct(
        public ?int                   $acidity,
        public ?string                $acidity_description,
        public ?BackgroundImageData   $background_image,
        public ?BaselineStructureData $baseline_structure,
        public ?int                   $blurb,
        public ?int                   $body,
        public ?string                $body_description,
        public ?CountryData           $country,
        public ?string                $description,
        #[DataCollectionOf(FoodData::class)]
        public ?DataCollection        $food,
        #[DataCollectionOf(GrapeData::class)]
        public ?DataCollection        $grapes,
        public ?bool                  $hidden,
        public ?int                   $id,
        public ?string                $name,
        public ?string                $interesting_facts,
        public ?int                   $parent_style_id,
        public ?RegionData            $region,
        public ?string                $regional_name,
        public ?string                $seo_name,
        public ?StatisticsStyleData   $statistics,
        public ?string                $varietal_name,
        public ?string                $vintage_mask,
        public ?int                   $wine_type_id
    )
    {
    }
}
