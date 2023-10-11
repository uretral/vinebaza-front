<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropCountry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Country
{
    #[Url]
    public array $country = [];

    public ?int $takeCountries = 10;

    public ?string $countrySearch = '';

    #[Computed]
    public function getCountries()
    {
        return PropCountry::where('active', 1)
            ->when($this->takeCountries, function ($query) {
                $query->Take($this->takeCountries);
            })
            ->when($this->countrySearch, function (Builder $query) {
                $query
                    ->where('name_ru', 'like', "%$this->countrySearch%")
                    ->orWhere('name_en', 'like', "%$this->countrySearch%");
            })
            ->orderBy('sort')
            ->get();
    }

    #[Computed]
    public function countryTitles(): Collection
    {
        return PropCountry::whereIn('id', $this->country)
            ->select('id','name_en', 'name_from_ru', 'name_ru')
            ->get();
    }

    public function deleteCountry($id) : void {
        if (($key = array_search($id, $this->country)) !== false) {
            unset($this->country[$key]);
        }
    }
}
