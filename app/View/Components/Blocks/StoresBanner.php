<?php

namespace App\View\Components\Blocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StoresBanner extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function stores(): array
    {
        return [
            (object)[ 'img' => 'atak.png','discount'=> 'до 60%','d'=>'25','offer'=>'предложений'],
            (object)[ 'img' => 'ashan.png','discount'=> 'Спец.скидки','d'=>'635','offer'=>'предложений'],
            (object)[ 'img' => 'billa.png','discount'=> 'до 60%','d'=>'8','offer'=>'предложений'],
            (object)[ 'img' => '5ka.png','discount'=> 'Спец.скидки','d'=>'12','offer'=>'предложений'],
            (object)[ 'img' => 'victoria.png','discount'=> 'до 60%','d'=>'258','offer'=>'предложений '],
            (object)[ 'img' => 'redwhite.png','discount'=> 'Спец.скидки','d'=>'43','offer'=>'предложения'],
            (object)[ 'img' => 'probka.png','discount'=> 'до 60%','d'=>'712 ','offer'=>'предложений'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blocks.stores-banner',[
            'stores' => $this->stores()
        ]);
    }
}
