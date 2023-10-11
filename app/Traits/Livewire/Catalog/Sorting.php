<?php

namespace App\Traits\Livewire\Catalog;

use Livewire\Attributes\Computed;

trait Sorting
{

    public int $sortBy = 1;

    #[Computed]
    public function sortingList(): array
    {
        return [
            (object)['id' => 1, 'name' => 'По рейтингу'],
            (object)['id' => 2, 'name' => 'По популярности'],
        ];
    }
}
