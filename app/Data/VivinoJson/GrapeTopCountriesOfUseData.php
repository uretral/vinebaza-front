<?php

namespace App\Data\VivinoJson;

use App\Data\VivinoJson\Casts\TopCountriesOfUseCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class GrapeTopCountriesOfUseData extends Data
{
    public function __construct(
        public ?int    $percent,
        #[WithCast(TopCountriesOfUseCast::class)]
        public ?string $entity,
    )
    {
    }
}
