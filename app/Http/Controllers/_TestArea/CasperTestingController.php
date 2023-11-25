<?php

namespace App\Http\Controllers\_TestArea;

use App\Data\Parser\ParseResultData;
use App\Http\Controllers\Controller;
use App\Jobs\TrackVivinoParseJob;
use App\Services\Vivino\Processing\Info;
use App\Services\Vivino\Processing\Item;
use App\Services\Vivino\Selenium\VivinoJson;

class CasperTestingController extends Controller
{
    public function index()
    {


/*        $a = new VivinoJson();//155500251
        $a->handle(ParseResultData::from([
            'product_id' => 251,
            'status' => 'ok',
            'message' => 'Получена ссылка vivino',
            'result' => '/wines/1932616',
            'filepathInfo' => '/vivino/info/4737246_1468338.json',
            'filepathReviews' => '/vivino/reviews/4737246_1468338.json'
        ]), true);

        dump($a->output);*/


        $info = new Info(ParseResultData::from([
            'product_id' => 251,
            'status' => 'ok',
            'message' => 'Получена ссылка vivino',
            'result' => NULL,
            'filepathInfo' => '/vivino/info/4737246_1468338.json',
            'filepathReviews' => '/vivino/reviews/4737246_1468338.json'
        ]));
        $info->handle();


        return view('tpl.empty');

    }
}
