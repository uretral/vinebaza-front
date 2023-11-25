<?php

namespace App\Console\Commands\Vivino;

use App\Events\RealTimeMessage;
use App\Services\Vivino\Commands\Search;
use Illuminate\Console\Command;

class VTestCommand extends Command
{
    protected $signature = 'v:test {start_nr}';

    protected $description = 'Command description';

    public function handle(): void
    {
/*        $search = new Search($this->argument('start_nr'));
        $search->getProduct();
        event(new RealTimeMessage($search->handle()));*/
    }
}
