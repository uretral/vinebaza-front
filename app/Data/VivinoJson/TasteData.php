<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class TasteData extends Data
{
    public function __construct(
        #[DataCollectionOf(FlavorData::class)]
        public ?DataCollection $flavor,
        public ?StructureData $structure,
    )
    {
    }
}
