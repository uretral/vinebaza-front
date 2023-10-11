<?php

namespace App\Livewire;

use App\Models\Catalog\Product;
use App\Models\Props\PropColor;
use App\Models\Props\PropType;
use App\Traits\Livewire\Catalog\Color;
use App\Traits\Livewire\Catalog\Country;
use App\Traits\Livewire\Catalog\Grape;
use App\Traits\Livewire\Catalog\Pairing;
use App\Traits\Livewire\Catalog\Price;
use App\Traits\Livewire\Catalog\Rating;
use App\Traits\Livewire\Catalog\Sorting;
use App\Traits\Livewire\Catalog\Sugar;
use App\Traits\Livewire\Catalog\Taste;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Catalog extends Component
{
    // props
    use Price, Sugar, Color, Rating, Country, Grape, Taste, Pairing;

    //actions
    use Sorting, WithPagination;


    public int $perPage = 10;

    public ?int $changeState = null;

    #[On('change-state')]
    public function changeState()
    {
        $this->changeState = rand(100, 1000000);
    }

    #[On('load-more')]
    public function getMore()
    {
        $this->perPage = $this->perPage + 10;
    }


    #[Computed]
    public function getProducts(): Paginator
    {
        return Product::with([
            'vivino.review', 'vivino.user', 'color', 'brand', 'country', 'region', 'subRegion', 'winery'])
            ->whereHas('vivino', function ($vivino) {
                $vivino->whereBetween('price', [$this->priceMin, $this->priceMax]);
            })
            ->whereHas('vivino', function ($vivino) {
                $vivino->whereBetween('ratings_average', [$this->ratingMin, $this->ratingMax]);
            })
            ->when(count($this->color), function (Builder $query) {
                $query->whereIn('color_id', $this->color);
            })
            ->when(count($this->sugar), function (Builder $query) {
                $query->whereIn('sugar_id', $this->sugar);
            })
            ->when(count($this->country), function (Builder $query) {
                $query->whereIn('country_id', $this->country);
            })
            ->when(count($this->country), function (Builder $query) {
                $query->where('country_id', $this->country);
            })
            /*            ->when(count($this->grape), function (Builder $query) {
                            foreach($this->grape as $element){
                                $query->orWhereJsonContains('grapes_sub',$element);
                            }
                        })*/
//                ->orderBy('vivino.ratings_average')
            ->paginate($this->perPage);
    }


    public function mount()
    {
        $this->setPrices();
    }


    public function render(): View
    {
        return view('livewire.catalog');
    }
}
