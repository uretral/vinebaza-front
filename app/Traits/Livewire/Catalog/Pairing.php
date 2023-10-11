<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropPairing;
use App\Models\Props\PropTaste;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Pairing
{
    #[Url]
    public array $pairing = [];

    public ?int $takePairing = 10;

    public ?string $pairingSearch = '';

    #[Computed]
    public function getPairings()
    {
        return PropPairing::where('active', 1)
            ->when($this->takePairing, function ($query) {
                $query->Take($this->takePairing);
            })
            ->when($this->pairingSearch, function (Builder $query) {
                $query
                    ->where('name_ru','like', "%$this->pairingSearch%")
                    ->orWhere('name_en','like', "%$this->pairingSearch%");
            })
            ->get();
    }
}
