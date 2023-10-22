<?php

namespace App\Http\Controllers\_TestArea;

use App\Http\Controllers\Controller;
use App\Services\Vivino\VivinoVueController;
use App\Services\Winstyle\CatalogController;
use App\Services\Winstyle\ItemController;
use App\Services\Winstyle\ItemControllerDev;
use Bhavingajjar\LaravelPython\LaravelPython;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CasperTestingController extends Controller
{
    public function index()
    {
//        $site = ' https://winestyle.ru/wine/all/ html.txt';
        $site = ' https://google.com/ ';

//        exec('export OPENSSL_CONF=/dev/null && casperjs '.base_path('resources/assets/casper/casper-script.js').' https://winestyle.ru/wine/all/ html.txt --ssl-protocol=any', $output, $return_var);
//        print_r($output);
//        print_r($return_var);






//        $cmd = 'cd /home/murin/_dev/_Denis/vinobaza/vinobaza-front && export OPENSSL_CONF=/dev/null && phantomjs --ssl-protocol=any -–cookies-file=cookie.txt /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/phantom-parse.js "https://winestyle.ru/wine/all/"';
//        $html = shell_exec($cmd);
//        var_dump($html);

//        $stream = fopen("php://output", "w");



/*       $ex = shell_exec("export OPENSSL_CONF=/dev/null && PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs /usr/local/bin/casperjs /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/casper-script.js --ssl-protocol=any --cookies-file=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/public/cookie.txt  https://winestyle.ru/wine/all/?page=3");

       echo $ex;*/

/*        Artisan::call('winstyle:catalog',['page' => 5]);

       echo Artisan::output();*/

/*        $try = new CatalogController(88,1,1);

        dump($try);*/

/*        try {
            Artisan::call('winstyle:item', ['url' => 'https://winestyle.ru/products/S-Sebastiao-Tinto-Lisboa-IGP-2018.html']);
            return Artisan::output();
        } catch (\Exception $e) {
            dd($e);
        }*/

/*        $try = new ItemController('https://winestyle.ru/products/S-Sebastiao-Tinto-Lisboa-IGP-2018.html',888888,);

        dump($try);*/

/*        $item = new ItemControllerDev('https://winestyle.ru/products/Familia-Bastida-Alceo-Tempranillo-La-Mancha-DO-2021.html',999999);

        dump($item);*/
/*
        $vivinoParser = new VivinoVueController();

        $func = $vivinoParser->getContent('Familia Bastida, "Alceo" Tempranillo, La Mancha DO, 2021');

        dump('vivinoSearch',$func);*/

        Artisan::call('vivino:search', ['string' => '5']);
        echo Artisan::output();
//        dump(file_get_contents('/home/murin/_dev/_Denis/vinobaza/vinobaza-front/html5.txt'));

//        shell_exec('/bin/python /home/murin/_dev/_py/vin/m2.py');


/*        $python = new LaravelPython();
        $result = $python->run('thanks.py');
        dump($result);*/


// executes after the command finishes





        return view('tpl.empty');

    }
}
