<?php

namespace App\Livewire\Admin;

use App\Data\Parser\ParseResultData;
use App\Jobs\TrackVivinoParseJob;
use App\Models\ComputedCookie;
use App\Models\Donors\Donor;
use App\Services\Vivino\Processing\Item;
use App\Services\Vivino\Processing\Search;
use App\Traits\Livewire\VivinoParse\hasObserver;
use App\Traits\Livewire\VivinoParse\Header;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class VivinoParse extends Component
{

    use Header, hasObserver;

    public bool $start = false;
    public ?int $startId = 0;

    public ?ParseResultData $jobResponse = null;

    /*for DBCookie*/
    public $component = self::class;



    public function result($class)
    {
        $result = ComputedCookie::whereProperty($class)->first();
        $this->jobResponse = $result ? ParseResultData::from($result->json) : null;
    }

    public function startParse(): void
    {
        $this->start = true;
    }

    public function ifPaused(): void
    {
        if (!$this->start) {
            $this->currentAction('Приостановлено');
            return;
        }
    }

    #[On('onMakeTest')]
    public function makeTest() {
/*        $class = Search::class;
        $this->result($class);
        if($this->jobResponse && $this->jobResponse->result) {
            $this->parseItem($class);
        }*/
        TrackVivinoParseJob::dispatch(Item::class, [$this->jobResponse, true]);
    }

    #[On('starter')]
    public function starter()
    {
        $this->startParse();
        $this->search();
    }

    #[On('stopper')]
    public function stopper()
    {
        $this->start = false;
        $this->currentAction('Подготовка к паузе');
    }



    /**/
    public function next()
    {
        if ($this->start) {
            $this->setStartId();
            $this->startParse();
        } else {
            $this->currentAction('Приостановлено');
        }
    }

    public function currentAction($message)
    {
        $this->dispatch('action', $message);
    }







    public function updated($prop, $value)
    {
//        if($prop == 'startId') {
//            $this->setStartId($value);
//        }

    }


    public function mount()
    {
        Donor::with('links')->get();
        $this->getStartId();
        $this->getPerSeance();
    }

    public function render(): View
    {
        return view('livewire.admin.vivino-parse', []);
    }
}
