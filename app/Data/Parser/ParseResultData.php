<?php

namespace App\Data\Parser;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class ParseResultData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int     $product_id,
        public string  $status,
        public string  $message,
        public ?string $result,
        public ?string $filepathInfo,
        public ?string $filepathReviews,
    )
    {
    }
}
