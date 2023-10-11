<?php

namespace App\Console\Commands;

use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Models\Props\PropCountry;
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

        Product::all()->each(function (Product $product) {
            $product->grapes_sub = $product->grapes;
            $product->save();
            dump($product->id);
        });
    }
}
