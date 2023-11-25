<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class WineryGroupData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?string $name,
        public ?string $website,
    )
    {
    }
}
