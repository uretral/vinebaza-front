<?php

namespace App\Livewire\Elements;

use Livewire\Component;

class Dropdown extends Component
{
    public $open = false;
    public $name;
    public $heading;
    public $list;
    public $title;
    public $active;
    public $data;

    public function render()
    {
        $this->data = $this->obj();
        return view('livewire.elements.dropdown');
    }

    public function obj(): array
    {

        $this->active = $this->list[0];

        return [
            'name' => $this->name,
            'heading' => $this->heading,
            'list' => json_decode($this->list),
            'title' => $this->title,
            'active' => json_decode($this->active)
        ];
    }

    public function postAdded(){
        return 'postAdded';
    }
}
