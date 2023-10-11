<?php

namespace App\Livewire\Widgets;

use App\Models\Catalog\Vivino;
use App\Models\Props\PropColor;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class FilterCatalogWidget extends Component
{
    public Collection $colors;

//    #[Url(keep: true)]
    public ?int $color = null;
    public string $colorName = '';

    #[Locked]
    public int $priceMinStatic;
//    #[Url(keep: true)]
    public int $priceMin = 1000;

    #[Locked]
    public int $priceMaxStatic;
//    #[Url(keep: true)]
    public int $priceMax = 7500;

//    #[Url(keep: true)]
    public float $ratingMin = 2.5;
//    #[Url(keep: true)]
    public float $ratingMax = 4.5;

    public function mount()
    {
        $this->setColors();
        $this->setPrices();
        $this->url = request()->getRequestUri();
    }


    public function setColors(): void
    {
        $this->colors = PropColor::all()->sortBy('sort');
        $this->color = $this->colors->first()->getAttribute('id');
        $this->colorName = $this->colors->first()->getAttribute('name_ru');
    }

    public function setPrices(): void
    {
        $prices = Vivino::select(DB::raw('MIN(price) AS priceMin, MAX(price) AS priceMax'))->first();
        $this->priceMinStatic = $prices->priceMin;
        $this->priceMaxStatic = $prices->priceMax;

    }

    public function updatedColor($colorId)
    {
        $this->colorName = PropColor::find($colorId)->getAttribute('name_ru');
    }


    public function submitRedirect()
    {
        $this->redirect('/wines?' . http_build_query([
                'color' => [$this->color],
                'priceMin' => $this->priceMin,
                'priceMax' => $this->priceMax,
                'ratingMin' => $this->ratingMin,
                'ratingMax' => $this->ratingMax,
            ]));
    }


    public function render(): View
    {
        return view('livewire.widgets.filter-catalog-widget');
    }


}
