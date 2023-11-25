<?php

namespace App\Data\VivinoJson\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ValueCodeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return $value->code;
    }
}
