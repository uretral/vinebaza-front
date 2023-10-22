<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class VivinoData extends Data
{
    public function __construct(
      public ?InfoData $info
    ) {}
}
