<?php

namespace App\Services\Vivino\Commands;

use App\Data\VivinoJson\FoodData;
use App\Data\VivinoJson\VintageData;
use App\Data\VivinoJson\BackgroundImageData;
use App\Data\VivinoJson\WineData;
use App\Models\Catalog\Vivino;
use App\Services\Vivino\Selenium\VivinoJson;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;

class Item
{

    /*
     * Реализует создание json файла из парсера
     * и передачу события о создании файла
     * ЕСЛИ файла нет ИЛИ указано условие
     * принудительного парсинга ($update = true).
     *
     * ЕСЛИ файл спарсен или существует передаётся событие
     *
     * payload =  [
     *  "filepath" => "/vivino/json/155500251_1238789.json",
     *  "message" => "Найден файл / error message"
     *  "status" => "ok / error"
     * ]
     * */


    private string $urlPart;
    private int $vintageId;
    private bool $update;
    private mixed $output;


    public function __construct($url_part, $update = false)
    {
        $this->urlPart = $url_part;
        $this->vintageId = (int)preg_replace('/[^0-9]/', '', $this->urlPart);

        // принудительное обновление
        $this->update = $update;

        $this->handle();
    }

    public function handle()
    {
        $vivino = Vivino::where('vintage_id', $this->vintageId)->first();

        if ($this->update) {
            $this->json();
        }

        if ($vivino) {
            $this->isJsonExist($vivino);
        } else {
            $this->json();
        }

    }

    public function isJsonExist(Vivino $vivino)
    {

        $jsonFilePath = "/vivino/json/{$vivino->vintage_id}_{$vivino->wine_id}.json";
        if (file_exists(storage_path($jsonFilePath))) {
            $this->output = [
                "filepath" => "/vivino/json/155500251_1238789.json",
                "message" => "Найден файл / error message",
                "status" => "ok / error"
            ];
        }
        dump('will parse isJsonExist' . $this->vintageId);
    }

    public $is_inner = false;

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function json()
    {
        if ($this->is_inner) {
            $f = file_get_contents('/home/murin/_dev/_Denis/vinobaza/vinobaza-front/resources/assets/json/t.json');
            $this->output = json_decode($f, true);


//        dump($this->output->vintagePageInformation->vintage); // ->winePageInformation->vintage

//        $vintage = VintageData::from($this->output['vintagePageInformation']['vintage']);

            $wine =
                WineData::from(
                    $this->output['vintagePageInformation']['wine']
                );

//        $wine = $this->output;

//        $r = $this->output->vintagePageInformation->wine->foods[0];
//        dump(FoodData::from($r));
//        $wine = WineData::from($this->output->vintagePageInformation->wine);
            dump($wine->toArray());
//        dump($wine);
        } else {
            $vivinoJson = new VivinoJson();
//            return $vivinoJson->handle($this->urlPart);
            dump($vivinoJson->handle($this->urlPart));
        }
    }


}
