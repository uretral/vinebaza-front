<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class WineData extends Data
{
    public function __construct(
        public ?int                 $id,
        public ?float               $alcohol,
        public ?string              $closure,
        public ?string              $description,
        #[DataCollectionOf(FoodData::class)]
        public ?DataCollection      $foods,
        #[DataCollectionOf(GrapeData::class)]
        public ?DataCollection      $grapes,
        public ?bool                $has_valid_ratings,
        public ?bool                $hidden,
        public ?bool                $is_first_wine,
        public ?bool                $is_natural,
        public ?string              $name,
        public ?bool                $non_vintage,
        public ?RanksCollectionData $rank,
        public ?RegionData          $region,
        public ?int                 $review_status,
        public ?string              $seo_name,
        public ?StatisticsWineData  $statistics,
        public ?StyleData           $style,
        public ?int                 $sweetness_id,
        public ?int                 $type_id,
        public ?string              $created_at,
        public ?string              $updated_at,
        public ?string              $vintage_mask_raw,
        public ?int                 $vintage_type,
        #[DataCollectionOf(VintagesData::class)]
        public ?DataCollection      $vintages,
        public WineryData           $winery
    )
    {
    }
}
