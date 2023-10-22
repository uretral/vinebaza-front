<?php

namespace App\Livewire\Admin;

use App\Data\Parser\ItemRawData;
use App\Models\Catalog\Product;
use App\Services\Winstyle\CatalogController;
use App\Services\Winstyle\ItemController;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Donor extends Component
{

    public $pause = true;
    public $parsingPage = 0;


    public $currentAction = '';
    public  $parsedCatalogRaw = [];
    public  $parsedCatalogResult = [];
    public  $parsedCatalogProductsCode = [];

    public $message = 'Бездействуем...)';
    public $pageMessage = '';


    public $errPages = [];
    public $errCatalog = [];

    public int $pagesCnt = 10;
    public int $currentCatalogPage = 3;



    public $b = [];


    public function setMessage($message) {
        $this->message = $message;
    }


    public function startParse()
    {
        $this->setMessage("Парсим каталог $this->currentCatalogPage");
        $this->parseCatalog();


    }

    public function parseCatalog() {
        $parsedCatalog = new CatalogController($this->currentCatalogPage, 1, 1);
        $this->parsedCatalogResult = $parsedCatalog->result;
        $this->parsedCatalogProductsCode = $parsedCatalog->result['product_created'];
        $this->parsedCatalogRaw = $parsedCatalog->catalogItems;
        $this->setMessage("Получены данные каталога $this->currentCatalogPage");
        $this->parsePages();
    }

    public function parsePages() {
        foreach ($this->parsedCatalogRaw as $itemRawData) {
            $this->parsePage($itemRawData);

        }

    }

    public function parsePage(ItemRawData $itemRawData) {

        $product = Product::where('code', $itemRawData->code)->first();



        $itemController = new ItemController(' https://winestyle.ru'.$itemRawData->url, $product->id);
        $this->setMessage("Получены данные каталога $itemController->link");

//        if($itemController) {
            $this->b[] = $itemController->link;
//        }
    }

    public function updatedParsedCatalogProductsCode() {

    }




    #[Computed]
    public function parsed()
    {
        return [];

    }


    public $counter = 0;

    public function increment()
    {
        $this->counter++;
    }

    public function decrement()
    {
        $this->counter--;
    }

    public function render()
    {
        return view('livewire.admin.donor');
    }
}
