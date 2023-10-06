<?php

namespace App\Livewire\Elements;

use Livewire\Component;

class Select extends Component
{
    public $open = false;
    public $name;
    public $heading;
    public $list;
    public $title;
//    public $active;
    public $obj;

    public function render()
    {
        $this->obj = (object)$this->obj();
        return view('livewire.elements.select');
    }

    public function obj(): array
    {

//        $this->active = $this->list[0];

        return [
            'name' => $this->name,
            'heading' => $this->heading,
            'list' => $this->list,
            'title' => $this->title,
//            'active' => $this->active
        ];
    }

}
