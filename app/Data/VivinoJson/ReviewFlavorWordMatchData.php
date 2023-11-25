<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ReviewFlavorWordMatchData extends Data
{
    public function __construct(
        public ?int $review_id,
        #[MapInputName('id')]
        public ?int $keyword_id,
    )
    {
    }
}
