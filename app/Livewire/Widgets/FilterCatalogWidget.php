<?php

namespace App\Livewire\Widgets;

use App\Models\Props\PropColor;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FilterCatalogWidget extends Component
{
    public Collection $colors;
    public ?int $color = null;
    public string $colorName = '';

    public function mount()
    {
        $this->setColors();
        $this->setPrice();
    }


    public function setColors(): void
    {
        $this->colors = PropColor::all()->sortBy('sort');
        $this->color = $this->colors->first()->getAttribute('id');
        $this->colorName = $this->colors->first()->getAttribute('name_ru');
    }

    public function setPrice(): void {
        return ;
    }

    public function updatedColor($colorId)
    {
        $this->colorName = PropColor::find($colorId)->getAttribute('name_ru');
    }

    public function render(): View
    {
        return view('livewire.widgets.filter-catalog-widget', [
            /*            'color' => $this->color,
                        'colorName' => $this->colorName*/
        ]);
    }


}
