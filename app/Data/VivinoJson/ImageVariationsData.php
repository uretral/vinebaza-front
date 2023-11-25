<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class ImageVariationsData extends Data
{
    public function __construct(
        public ?string $bottle_large,
        public ?string $bottle_medium,
        public ?string $bottle_medium_square,
        public ?string $bottle_small,
        public ?string $bottle_small_square,
        public ?string $label,
        public ?string $label_large,
        public ?string $label_medium,
        public ?string $label_medium_square,
        public ?string $label_small_square,
        public ?string $large,
        public ?string $medium,
        public ?string $medium_square,
        public ?string $small_square,
        public ?string $small,
    )
    {
    }
}
