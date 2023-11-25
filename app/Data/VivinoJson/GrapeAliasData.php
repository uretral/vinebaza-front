<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class GrapeAliasData extends Data
{
    public function __construct(
        public int     $id,
        public ?string $name,
        public ?string $seo_name,
        public ?bool   $has_detailed_info,
        public ?int    $wines_count,
        public ?int    $parent_grape_id,
    )
    {
    }
}
