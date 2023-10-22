<?php

namespace App\Console\Commands\Vivino;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class VivinoSearchCommand extends Command
{
    protected $signature = 'vivino:search {string}';

    protected $description = 'Command description';

    public function callback($buffer = '')
    {
        // replace all the apples with oranges
        return $buffer;
    }

    public function handle(): void
    {



        $name = $this->argument('string');
//        $name = explode(' ', $name);
//        $name = implode('+', $name);
        /*$output = shell_exec('export OPENSSL_CONF=/dev/null && PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs  /usr/local/bin/casperjs --ssl-protocol=TLSv --ignore-ssl-errors=yes --cookies-file=/vivino-cookies.txt'. '  ' . base_path('resources/assets/casper/test.js '). ' ' . $name . ' 2>&1');*/

//


/*        $output = shell_exec('/bin/python /home/murin/_dev/_py/vin/m2.py');

        dump($output);*/

        $process = new Process(['/home/murin/_dev/_Denis/vinobaza/vinobaza-front/app/Py/v_env/bin/python', '/home/murin/_dev/_Denis/vinobaza/vinobaza-front/app/Py/vivino.py']);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

//        echo $process->getOutput();


    }
}
