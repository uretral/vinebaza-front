<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class BackgroundImageData extends Data
{
    public function __construct(
        public ?ImageVariationsData $variations,
        public ?string              $location,
        public ?string              $small,
    )
    {
    }
}
