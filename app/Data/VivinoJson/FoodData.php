<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class FoodData extends Data
{
    public function __construct(
        public ?BackgroundImageData $background_image,
        public ?int                 $id,
        public ?string              $name,
        public ?string              $seo_name
    )
    {
    }
}
