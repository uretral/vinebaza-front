<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Sugar
{

    #[Url(keep: true)]
    public array $sugar = [];

    #[Computed]
    public function colorSugars(): Collection{
        return PropType::whereIn('id',$this->sugar)
            ->select('id','name_en','name_ru')
            ->get();
    }

    #[Computed]
    public function getSugar(): Collection
    {
        return PropType::all()->sortBy('sort');
    }

    public function deleteSugar($id) : void {
        if (($key = array_search($id, $this->sugar)) !== false) {
            unset($this->sugar[$key]);
        }
    }
}
