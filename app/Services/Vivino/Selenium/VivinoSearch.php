<?php

namespace App\Services\Vivino\Selenium;

use App\Classes\VivinoSelenium;
use Facebook\WebDriver\WebDriverBy;

class VivinoSearch extends VivinoSelenium
{
    public function handle($name, $productId): array
    {
        $this->output['product_id'] = $productId;
        $this->driver->get("https://www.vivino.com/search/wines?q=$name");
        $this->result();
        $this->driver->quit();
        return $this->output;
    }

    public function crawler(): string
    {
        return $this->driver->findElement(
            WebDriverBy::cssSelector(
                '.link-color-alt-grey[data-cartitemsource="text-search"]'
            )
        )->getAttribute('href') ?? 'nothing';
    }

    public function result() {
        try {
            $link = $this->crawler();
            $this->output['status'] = 'ok';
            $this->output['result'] = $link;
            $this->output['message'] = "Получена ссылка vivino $link";
        } catch (\Exception $e) {
            $this->output['status'] = 'error';
            $this->output['message'] = "vivino search result : " . $e->getMessage();
        }
    }
}
