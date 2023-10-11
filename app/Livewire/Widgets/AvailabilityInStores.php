<?php

namespace App\Livewire\Widgets;

use App\Models\Staff\Stores;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AvailabilityInStores extends Component
{
    #[Computed]
    public function stores(): Collection
    {
        return Stores::where('active', 1)->get();
    }

    public function render(): View
    {
        return view('livewire.widgets.availability-in-stores');
    }
}
