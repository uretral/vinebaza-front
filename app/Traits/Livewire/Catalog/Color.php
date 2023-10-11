<?php

namespace App\Traits\Livewire\Catalog;

use App\Models\Props\PropColor;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

trait Color
{

    #[Url]
    public array $color = [];

    #[Computed]
    public function colorTitles(): Collection{
        return PropColor::whereIn('id',$this->color)
            ->select('id','name_en','name_ru')
            ->get();
    }

    #[Computed]
    public function getColors(): Collection
    {
        return PropColor::all()->sortBy('sort');
    }

    public function deleteColor($id) : void {
        if (($key = array_search($id, $this->color)) !== false) {
            unset($this->color[$key]);
        }
    }
}
