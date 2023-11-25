<?php

namespace App\Console\Commands\Vivino;

use App\Events\RealTimeMessage;
use App\Services\Vivino\Commands\Item;
use Illuminate\Console\Command;

class VivinoItemCommand extends Command
{
    protected $signature = 'vivino:item {url_part}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $search = new Item($this->argument('url_part'));
//        event(new RealTimeMessage($search->handle()));
    }
}
