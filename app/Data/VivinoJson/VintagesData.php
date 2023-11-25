<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class VintagesData extends Data
{
    public function __construct(
        public ?GrapeData           $grapes,
        public ?bool               $has_valid_ratings,
        public ?int                $id,
        public ?string             $name,
        public ?string             $seo_name,
        public ?StatisticsWineData $statistics,
        public ?int                $year,
    )
    {
    }
}
