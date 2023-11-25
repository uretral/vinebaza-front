<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class KeywordsData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $count,
        public ?string $name,
    )
    {
    }
}
