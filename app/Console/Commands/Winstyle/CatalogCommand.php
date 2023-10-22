<?php

namespace App\Console\Commands\Winstyle;

use Illuminate\Console\Command;

class CatalogCommand extends Command
{
    protected $signature = 'winstyle:catalog {page?}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $output = shell_exec("export OPENSSL_CONF=/dev/null && PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs /usr/local/bin/casperjs /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/winstyle-parse-catalog.js --ssl-protocol=any --cookies-file=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/cookie.txt ".$this->argument('page') );

        $this->info($output);
    }
}
