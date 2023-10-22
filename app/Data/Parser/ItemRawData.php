<?php

namespace App\Data\Parser;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class ItemRawData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public string $slug,
        public ?string $name,
        public ?string $translit,
        public ?string $articul,
        public ?int $code,
        public ?string $url,
        public ?array $experts_rating,
        public ?string $volume,
        public ?string $volume_type,
        public ?string $country,
        public ?string $region,
        public ?string $sub_region,
        public ?string $manufacturer,
        public ?string $brand,
        public ?string $strength,
        public ?array $grapes,
        public ?string $type,
        public ?string $color,
        public ?string $price,
        public ?string $price_discount,
        public ?int $stock,
        public ?string $picture_small,
    )
    {
    }
}
