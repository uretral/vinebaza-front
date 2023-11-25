<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class VintageData extends Data
{
    public function __construct(
        public ?int                 $id,
        #[DataCollectionOf(VintageAwardData::class)]
        public ?DataCollection      $awards,
        public ?string              $certified_biodynamic,
        public ?string              $description,
        public ?array               $grape_composition,
        #[DataCollectionOf(GrapeData::class)]
        public ?DataCollection      $grapes,
        public ?bool                $has_valid_ratings,

        public ?BackgroundImageData $image,
        public ?string              $name,
        public ?int                 $organic_certification_id,
        public ?RanksCollectionData $ranking,
        public ?\stdClass           $ratings_distribution,
        public ?string              $seo_name,
        public ?StatisticsWineData  $statistics,
        #[DataCollectionOf(TopListRankingsData::class)]
        public ?DataCollection      $top_list_rankings,
        public ?array               $wine_critic_reviews,
        public mixed                $wine_facts,
        public ?WineMakerData       $wine_maker,
        public ?string              $winemaker,
        public ?string              $year,
    )
    {
    }
}
