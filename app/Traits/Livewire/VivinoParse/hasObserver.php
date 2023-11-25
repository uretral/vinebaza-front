<?php

namespace App\Traits\Livewire\VivinoParse;

use App\Events\TrackVivinoParseEvent;
use App\Jobs\TrackVivinoParseJob;
use App\Services\Vivino\Processing\Comments;
use App\Services\Vivino\Processing\Info;
use App\Services\Vivino\Processing\Item;
use App\Services\Vivino\Processing\Search;
use Livewire\Attributes\On;

trait hasObserver
{

    #[On('echo:vivino,.' . TrackVivinoParseEvent::class)]
    public function observer($payload): void
    {

        $this->result($payload['action']);

        $this->ifPaused();

        $this->parseItem($payload['action']);

//        $this->manageJsonInfo($payload['action']);

//        $this->manageJsonComments($payload['action']);

    }

    /*Запрос и поиск по wine id*/
    public function parseKnownProduct(): void
    {
        if($this->concreteWineId) {
            $this->currentAction("Запрос продукта $this->concreteWineId");
            TrackVivinoParseJob::dispatch(Search::class, [$this->concreteWineId, true]);
        }

    }

    /*Запрос и поиск продукта*/
    public function search(): void
    {
        $this->currentAction("Запрос продукта $this->startId");
        TrackVivinoParseJob::dispatch(Search::class, [$this->startId, false]);
    }

    /*Получение Info и Comments*/
    public function parseItem($action): void
    {
        if ($action == Search::class) {
            TrackVivinoParseJob::dispatch(Item::class, [$this->jobResponse]); //$this->jobResponse->result
            $this->currentAction('Найден продукт, собираются данные с Vivino');
        }
    }

    /*Формирование записей в базу основного инфо*/
    public function manageJsonInfo($action): void
    {
        if ($action == Item::class) {
            TrackVivinoParseJob::dispatch(Info::class);
            $this->currentAction('Формирование основного инфо в базу');
        }
    }

    /*Формирование комментариев в базу*/
    public function manageJsonComments($action): void
    {
        if ($action == Info::class) {
            TrackVivinoParseJob::dispatch(Comments::class);
            $this->currentAction('Формирование комментариев в базу');
        }
    }

}
