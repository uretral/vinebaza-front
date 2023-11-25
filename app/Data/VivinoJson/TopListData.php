<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class TopListData extends Data
{
    public function __construct(
        public ?string             $author,
        public ?string             $country,
        public ?string             $description,
        public ?string             $icon,
        public ?int                $id,
        public BackgroundImageData $image,
        public ?string             $intro_header,
        public ?int                $level,
        public ?string             $name,
        public ?string             $seo_name,
        public ?string             $short_description,
        public ?string             $state,
        #[MapInputName('updated_at')]
        public ?string             $updated
    )
    {
    }
}
