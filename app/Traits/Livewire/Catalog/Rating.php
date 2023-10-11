<?php

namespace App\Traits\Livewire\Catalog;

use Livewire\Attributes\Url;

trait Rating
{
    #[Url(keep: true)]
    public float $ratingMin = 2.5;
    #[Url(keep: true)]
    public float $ratingMax = 4.5;

}
