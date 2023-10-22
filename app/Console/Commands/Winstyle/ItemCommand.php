<?php

namespace App\Console\Commands\Winstyle;

use Illuminate\Console\Command;

class ItemCommand extends Command
{
    protected $signature = 'winstyle:item {url}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $output = shell_exec("export OPENSSL_CONF=/dev/null && PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs /usr/local/bin/casperjs /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/winstyle-item.js --ssl-protocol=any --cookies-file=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/cookie.txt ".$this->argument('url'));

        $this->info($output);
    }
}
