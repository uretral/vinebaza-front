<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class ImageData extends Data
{
    public function __construct(
        public ?string $location,
        public ?ImageVariationsData $variations,
    )
    {
    }
}
