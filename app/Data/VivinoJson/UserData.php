<?php

namespace App\Data\VivinoJson;

use App\Data\VivinoJson\BackgroundImageData;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $alias,
        public ?BackgroundImageData $background_image,
        public ?BackgroundImageData $image,
        public ?bool $is_featured,
        public ?bool $is_premium,
        public ?string $language,
        public ?string $seo_name,
        public ?UserStatisticsData $statistics,
        public ?string $visibility,
    )
    {
    }
}
