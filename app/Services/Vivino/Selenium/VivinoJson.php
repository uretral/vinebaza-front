<?php

namespace App\Services\Vivino\Selenium;

use App\Classes\VivinoSelenium;
use App\Data\Parser\ParseResultData;
use App\Models\Vivino\Grape;
use Facebook\WebDriver\Chrome\ChromeDevToolsDriver;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Illuminate\Support\Facades\Log;

class VivinoJson extends VivinoSelenium
{
    private int $vintageId;
    private int $wineId;
    private array $images = [];
    private array $grapes = [];
    private array $regions = [];
    private array $arRegionsId = [];

    /*
     * https://www.vivino.com/api/regions/144
     *
     *
     * */


    public function handle(ParseResultData $jobResponse, $isTestMode = false): array
    {

        $this->driver->get("https://www.vivino.com$jobResponse->result");
        $this->output['product_id'] = $jobResponse->product_id;
        sleep(2);
        $this->result();
        $this->driver->quit();
        if ($isTestMode) {
            return $this->output;
        } else {
            return array_intersect_key(
                $this->output,
                array_flip(['status', 'message', 'filepathInfo', 'filepathReviews', 'product_id'])
            );
        }
    }


    public function result()
    {
        try {

            $this->getInfo();
            $this->getReviews();
            $this->getTastes();
            $this->getHighlights();
            $this->getCountry();
            $this->collectRegions();
            $this->getGrapes();
            $this->collectVintages();
            $this->getReviewsFlavored();

            $this->saveInfoJson();
//            $this->saveReviewsJson();

            /*            echo '<pre>';
                        print_r($this->output['regions']);
                        echo '</pre>';*/


            $this->output['message'] = "Получена ссылка vivino";
            $this->output['status'] = 'ok';
        } catch (\Exception $e) {
            $this->output['status'] = 'error';
            $this->output['message'] = "vivino json result : " . $e->getMessage();
        }
    }

    /**
     * @return void
     */
    public function getInfo(): void
    {
        if ($vintagePage = $this->driver->executeScript('return window.__PRELOADED_STATE__.vintagePageInformation')) {
            $this->vintageId = $vintagePage['vintage']['id'];
            $this->wineId = $vintagePage['wine']['id'];

            $this->vintagePageInformation($vintagePage);
        }

        if ($winePage = $this->driver->executeScript('return window.__PRELOADED_STATE__.winePageInformation')) {
            $this->vintageId = $winePage['vintage']['id'];
            $this->wineId = $winePage['wine']['id'];

            $this->winePageInformation($winePage);
        }

        $this->output['vintageId'] = $this->vintageId;
        $this->output['wineId'] = $this->wineId;

        $this->collectGrapes($this->output['wine']['grapes']);


    }

    public function vintagePageInformation($vintagePage)
    {
        /* get wine and extracting images array*/
        if (array_key_exists('wine', $vintagePage['vintage'])) {
            if (array_key_exists('image', $vintagePage['vintage']['wine'])) {
                $this->images = $vintagePage['vintage']['wine']['image'];
                unset($vintagePage['vintage']['wine']['image']);
            }
            $this->output['wine'] = $vintagePage['vintage']['wine'];
            unset($vintagePage['vintage']['wine']);
        } else {
            if (array_key_exists('image', $vintagePage['wine'])) {
                $this->images = $vintagePage['wine']['image'];
                unset($vintagePage['wine']['image']);
            }
            $this->output['wine'] = $vintagePage['wine'];
        }

        /*get vintage and extracting images array*/
        if (array_key_exists('image', $vintagePage['vintage'])) {
            if (!count($this->images)) {
                $this->images = $vintagePage['vintage']['image'];
            }
            unset($vintagePage['vintage']['image']);
        }
        $this->output['vintage'] = $vintagePage['vintage'];
        $this->output['image'] = $this->images;
    }

    public function winePageInformation($winePage)
    {
        /* get wine and extracting images array*/
        if (array_key_exists('image', $winePage['wine'])) {
            $this->images = $winePage['wine']['image'];
            unset($winePage['wine']['image']);
        }
        $this->output['wine'] = $winePage['wine'];

        /*get vintage and extracting images array*/
        if (array_key_exists('image', $winePage['vintage'])) {
            $this->images = $winePage['vintage']['image'];
            unset($winePage['vintage']['image']);
        }

        if (array_key_exists('wine', $winePage['vintage'])) {
            unset($winePage['vintage']['wine']);
        }

        $this->output['vintage'] = $winePage['vintage'];
        $this->output['image'] = $this->images;
    }

    /**
     * @return void
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function getReviews(): void
    {
        try {
            $reviews = [];
            for ($item = 1; $item <= 4; $item++) {
                $tempReviews = $this->callVivinoApi("wines/$this->wineId/reviews?per_page=50&page=$item&language=en");
                if (count($tempReviews)) {
                    $reviews = array_merge($reviews, $tempReviews['reviews']);
                } else {
                    break;
                }
            }
            $this->output['reviews'] = $reviews;
        } catch (\Exception $e) {
            Log::info("vivino getReviews $this->wineId : " . $e->getMessage());
        }

    }


    public function getReviewsFlavored(): void
    {
        $this->output['reviews_with_flavor'] = [];
        if (array_key_exists('flavor', $this->output['tastes'])) {

            foreach ($this->output['tastes']['flavor'] as $flavor)

                if (array_key_exists('primary_keywords', $flavor)) {
                    $str = '';
                    foreach ($flavor['primary_keywords'] as $primary_keyword) {
                        $str = $str."&flavor_ids[]=".$primary_keyword['id'];
                    }
                    try {
                        $this->output['reviews_with_flavor'] = array_merge(
                            $this->output['reviews_with_flavor'],
                            $this->driver->executeScript("return await fetch('https://www.vivino.com/api/wines/{$this->wineId}/reviews_with_flavors?{$str}&per_page=50&page=1&language=en').then(response => response.json()).then(res => res.reviews);")
                        );
                    } catch (\Exception $e) {
                        Log::info("vivino getReviews $this->wineId : " . $e->getMessage());
                    }

                }
//            $this->output['reviews_with_flavor'] = $reviews;
            sleep(2);
        }
    }

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function getHighlights(): void
    {
        try {
            $this->output = $this->output + $this->callVivinoApi("wines/$this->wineId/highlights?per_page=30&language=en");
        } catch (\Exception $e) {
            Log::info("vivino getHighlights $this->wineId : " . $e->getMessage());
        }
    }

    /**
     * @return void
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function getTastes(): void
    {
        try {
            $this->output = $this->output + $this->callVivinoApi("wines/$this->wineId/tastes");
        } catch (\Exception $e) {
            Log::info("vivino getTastes $this->wineId : " . $e->getMessage());
        }

    }

    public function saveInfoJson()
    {
        $filepath = '/vivino/info/' . $this->vintageId . '_' . $this->wineId . '.json';

        try {

            $this->output['filepathInfo'] = $filepath;

            $array = [];
            if (array_key_exists('product_id', $this->output))
                $array['product_id'] = $this->output['product_id'];
            if (array_key_exists('highlights', $this->output))
                $array['highlights'] = $this->output['highlights'];
            if (array_key_exists('wine', $this->output))
                $array['wine'] = $this->output['wine'];
            if (array_key_exists('vintage', $this->output))
                $array['vintage'] = $this->output['vintage'];
            if (array_key_exists('grapes', $this->output))
                $array['grapes'] = $this->output['grapes'];
            if (array_key_exists('country', $this->output))
                $array['country'] = $this->output['country'];
            if (array_key_exists('regions', $this->output))
                $array['regions'] = $this->output['regions'];
            if (array_key_exists('vintages', $this->output))
                $array['vintages'] = $this->output['vintages'];
            if (array_key_exists('image', $this->output))
                $array['image'] = $this->output['image'];
            if (array_key_exists('tastes', $this->output))
                $array['tastes'] = $this->output['tastes'];
            if (array_key_exists('reviews_with_flavor', $this->output))
                $array['reviews_with_flavor'] = $this->output['reviews_with_flavor'];
            if (array_key_exists('reviews', $this->output))
                $array['reviews'] = $this->output['reviews'];

            if (array_key_exists('filepath', $this->output))
                $array['filepath'] = $this->output['filepathInfo'];

            \Storage::disk('public')->put(
                $filepath,
                json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            );

        } catch (\Exception $e) {
            Log::info("vivino saveJson $filepath : " . $e->getMessage());
        }
    }

    public function saveReviewsJson()
    {
        $filepath = '/vivino/reviews/' . $this->vintageId . '_' . $this->wineId . '.json';
        try {

            $this->output['filepathReviews'] = $filepath;

            \Storage::disk('public')->put(
                $filepath,
                json_encode([
                    'product_id' => $this->output['product_id'],
                    'reviews' => $this->output['reviews']
                ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            );

        } catch (\Exception $e) {
            Log::info("vivino saveJson $filepath : " . $e->getMessage());
        }
    }

    public function collectGrapes($arr)
    {
        $this->grapes = array_merge($this->grapes, collect($arr)->map(fn($el) => $el['id'])->toArray());
    }

    public function getGrapes()
    {
        // todo включить постобработку на исключение существующих
        foreach (array_unique($this->grapes) as $grapeId) //if (!Grape::find($grapeId))
        {

            $this->output['grapes'][] = $this->driver->executeScript(" await fetch('https://www.vivino.com/grapes/{$grapeId}').then(response => response.text()).then(text => {const parser = new DOMParser;const htmlDocument = parser.parseFromString(text, 'text/html');const section = htmlDocument.documentElement.querySelector('.wrap');section.querySelectorAll('script').forEach(function (el) {var code = el.innerHTML;eval(code);});});return window.__PRELOADED_STATE__.grape;");
        }


        foreach ($this->output['grapes'] as $grape)
            if (array_key_exists('main_region', $grape) && is_array($grape['main_region']) && !in_array($grape['main_region']['id'], $this->arRegionsId)) {
                $this->output['regions'][] = $this->getRegion($grape['main_region']['id']);
            }


    }

    public function getCountry()
    {
        $slug = $this->output['wine']['region']['country']['seo_name'];
        $this->output['country'] = $this->driver->executeScript("await fetch('https://www.vivino.com/wine-countries/{$slug}').then(response => response.text()).then(text => {const parser = new DOMParser;const htmlDocument = parser.parseFromString(text, 'text/html');const code = Array.from(htmlDocument.documentElement.querySelectorAll('script')).find(el => el.innerHTML.includes(' window.__PRELOADED_STATE__.country'));eval(code.innerHTML);});return window.__PRELOADED_STATE__.country;");

        $this->collectGrapes($this->output['country']['most_used_grapes']);

    }

    public function collectRegions()
    {


        $ownRegion = $this->getRegion($this->output['wine']['region']['id']);

        if ($ownRegion && array_key_exists('sub_regions', $ownRegion) && is_array($ownRegion['sub_regions']))
            foreach ($ownRegion['sub_regions'] as $sub_regions) {
                $this->arRegionsId[] = $sub_regions['id'];
            }

        if ($ownRegion && array_key_exists('parent_regions', $ownRegion) && is_array($ownRegion['parent_regions']))
            foreach ($ownRegion['parent_regions'] as $parent_regions) {
                $this->arRegionsId[] = $parent_regions['id'];
            }

        $this->output['regions'][] = $ownRegion;


        foreach (array_unique($this->arRegionsId) as $id) {
            $this->output['regions'][] = $this->getRegion($id);
        }

        foreach ($this->output['regions'] as $region)
            if (array_key_exists('grapes', $region) && is_array($region['grapes'])) {
                $this->collectGrapes($region['grapes']);
            }


    }

    public function getRegion($regionId)
    {
        return $this->driver->executeScript("await fetch('https://www.vivino.com/wine-regions/{$regionId}').then(response => response.text()).then(text => {const parser = new DOMParser;const htmlDocument = parser.parseFromString(text, 'text/html');const code = Array.from(htmlDocument.documentElement.querySelectorAll('script')).find(el => el.innerHTML.includes(' window.__PRELOADED_STATE__.regionPageInformation'));eval(code.innerHTML);}); return window.__PRELOADED_STATE__.regionPageInformation.region;");

    }

    public function collectVintages()
    {
        if (array_key_exists('vintages', $this->output['wine']))
            foreach ($this->output['wine']['vintages'] as $vintage) {

                $this->output['vintages'][] = $this->getVintage($vintage['id']);

            }
    }

    public function getVintage($vintageId)
    {
        $vintage = $this->driver->executeScript("return await fetch('https://www.vivino.com/api/vintages/{$vintageId}').then(response => response.json()).then(json => json.vintage);");

        if (array_key_exists('wine', $vintage))
            unset($vintage['wine']);

        return $vintage;
    }

}
