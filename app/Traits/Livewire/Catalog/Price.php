<?php
namespace App\Traits\Livewire\Catalog;

use App\Models\Catalog\Vivino;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;

trait Price
{
    #[Locked]
    public int $priceMinStatic;

    #[Url(keep: true)]
    public int $priceMin = 1000;

    #[Locked]
    public int $priceMaxStatic;

    #[Url(keep: true)]
    public int $priceMax = 7500;

    public function setPrices(): void
    {
        $prices = Vivino::select(DB::raw('MIN(price) AS priceMin, MAX(price) AS priceMax'))->first();
        $this->priceMinStatic = $prices->priceMin;
        $this->priceMaxStatic = $prices->priceMax;

    }
}
