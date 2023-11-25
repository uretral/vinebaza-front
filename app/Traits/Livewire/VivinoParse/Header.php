<?php

namespace App\Traits\Livewire\VivinoParse;

use App\Classes\DataBaseCookie;
use App\Helpers\DBCookie;
use Livewire\Attributes\Computed;

trait Header
{
    public ?int $perSeance = null;
    public ?int $currentId = null;
    public ?int $concreteWineId = null;

    public function getStartId(): void
    {
        $this->startId = DBCookie::getInt($this->component, 'startId', 1);
    }

    public function setStartId($int): void
    {
        $this->startId = DBCookie::setInt($this->component, 'startId', $int);
    }

    public function updatedStartId($val): void
    {
        $this->setStartId($val);
    }


    public function getPerSeance(): ?int
    {
        return $this->perSeance = \session()->has('perSeance') ? \session('perSeance') : \session('perSeance', 1);
    }

    public function updatedPerSeance($perSeance): void
    {
        \session()->put('perSeance', $perSeance);
        $this->perSeance = (int)\session('perSeance');
    }



}
