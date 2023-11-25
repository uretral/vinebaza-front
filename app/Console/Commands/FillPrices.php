<?php

namespace App\Console\Commands;

use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Models\Props\PropBrand;
use App\Models\Props\PropColor;
use App\Models\Props\PropCountry;
use App\Models\Props\PropManufacturers;
use App\Models\Props\PropRegion;
use App\Models\Props\PropSubRegion;
use Illuminate\Console\Command;

class FillPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
/*        Vivino::all()->each(function ($item) {
            $item->ratings_average = rand(1,10) * .5;
            $item->save();
            dump($item->ratings_average);
        });*/

/*        PropCountry::all()->each(function (PropCountry $propCountry) {
             $propCountry->flag = "props/flags/$propCountry->id.webp";
            $propCountry->save();
            dump($propCountry->flag);
        });*/

/*        Product::all()->each(function (Product $product) {
            $product->grapes_sub = $product->grapes;
            $product->save();
            dump($product->id);
        });*/

/*        PropColor::all()->each(function ($prop) {
            $r = explode('/', $prop->url);
            $prop->slug = $r[2];
            $prop->save();
        });*/

//        $output = '';
//        $return_var = null;
//        shell_exec('export OPENSSL_CONF=/dev/null');
//        exec('export OPENSSL_CONF=/dev/null && casperjs /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/casper-script.js https://winestyle.ru/wine/all/?page=3 html.txt --ssl-protocol=any -–cookies-file=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/cookie.txt', $output, $return_var);
//        print_r($output);
//        print_r($return_var);

//        $output = shell_exec("export OPENSSL_CONF=/dev/null && PHANTOMJS_EXECUTABLE=/usr/local/bin/phantomjs /usr/local/bin/casperjs /home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/casper-script.js --ssl-protocol=any --cookies-file=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/casper/cookie.txt   https://winestyle.ru/wine/all/?page=5");
//
//
//        $this->info($output);

        $json = file_get_contents(public_path('storage/vivino/info/7549892_2491174.json'));
        $ar = json_decode($json, true);

        $arr = [2,10,500];
        $arr = array_merge($arr,collect($ar['wine']['grapes'])->map(fn($el) => $el['id'])->toArray());
        dump(
            array_unique($arr)
        );


    }
}
