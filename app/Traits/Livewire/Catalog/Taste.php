<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropCountry;
use App\Models\Props\PropTaste;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Taste
{

    #[Url]
    public array $country = [];

    public ?int $takeTastes = 10;

    public ?string $tasteSearch = '';

    #[Computed]
    public function getTastes()
    {
        return PropTaste::where('active', 1)
            ->when($this->takeTastes, function ($query) {
                $query->Take($this->takeTastes);
            })
            ->when($this->tasteSearch, function (Builder $query) {
                $query
                    ->where('name_ru','like', "%$this->tasteSearch%")
                    ->orWhere('name_en','like', "%$this->tasteSearch%");
            })
            ->get();
    }
}
