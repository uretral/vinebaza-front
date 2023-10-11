<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropGrape;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Grape
{
    #[Url(keep: true)]
    public array $grape = [];

    public ?int $takeGrape = 10;

    public ?string $grapeSearch = '';

    #[Computed]
    public function getGrapes(): Collection
    {
        return PropGrape::where('active', 1)
            ->when($this->takeGrape, function ($query) {
                $query->Take($this->takeGrape);
            })
            ->when($this->grapeSearch, function (Builder $query) {
                $query
                    ->where('name_ru', 'like', "%$this->grapeSearch%")
                    ->orWhere('name_en', 'like', "%$this->grapeSearch%");
            })
            ->get();
    }
}
