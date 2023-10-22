<?php

namespace App\Data\VivinoJson;

use App\Data\VivinoJson\Info\VintageData;
use Spatie\LaravelData\Data;

class InfoData extends Data
{
    public function __construct(
      public ?VintageData $vintage
    ) {}
}

