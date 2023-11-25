<?php

namespace App\Services\Vivino\Selenium;

use App\Classes\VivinoSelenium;
use App\Data\Parser\ParseResultData;
use Facebook\WebDriver\Chrome\ChromeDevToolsDriver;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Illuminate\Support\Facades\Log;

class VivinoGrape extends VivinoSelenium
{
    private int $vintageId;
    private int $wineId;
    private array $images = [];


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
                array_flip(['status', 'message', 'filepathInfo', 'filepathReviews','product_id'])
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
            $this->saveInfoJson();
            $this->saveReviewsJson();

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

            \Storage::disk('public')->put(
                $filepath,
                json_encode([
                    'product_id' => $this->output['product_id'],
                    'wine' => $this->output['wine'],
                    'vintage' => $this->output['vintage'],
                    'image' => $this->output['image'],
                    'tastes' => $this->output['tastes'],
                    'filepath' => $this->output['filepathInfo'],
                ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
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

}
