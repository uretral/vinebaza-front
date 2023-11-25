<?php

namespace App\Services\Vivino\Processing;


use App\Classes\DataBaseCookie;
use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Services\Vivino\Selenium\VivinoSearch;

class Search extends DataBaseCookie
{
    protected Product $product;
    protected string $searchString;
    private bool $isConcreteWineId;

    public function __construct($startNumber, $isConcreteWineId = false)
    {
        $this->ComputedCookieInt = $startNumber;
        $this->ComputedCookieComponent = 'VivinoParse';
        $this->ComputedCookieProperty = self::class;
        $this->isConcreteWineId = $isConcreteWineId;
    }

    public function handle():string
    {
        if($this->isConcreteWineId) {
            $this->getByWineId();
        } else {
            $this->getProduct();
            $this->makeSearchString();
            $this->ComputedCookieJson = $this->getContent();
        }
        $this->result();
        return self::class;
    }

    public function getProduct(): void
    {
        $this->product = Product::whereId(
            Product::where('id', '>', $this->ComputedCookieInt)->min('id')
        )->first();
    }

    public function makeSearchString(): void
    {
        $str = trim( preg_replace( "/[^0-9a-z]+/i", " ", $this->product->name ) );
        $str = explode(' ',$str);
        $this->searchString = implode('+',$str);
    }

    public function getContent(): array
    {
        $content = new VivinoSearch();
        return $content->handle($this->searchString, $this->product->id);
    }

    public function getByWineId() {
        if($vivino = Vivino::where('wine_id', $this->ComputedCookieInt)->first()) {
            $this->ComputedCookieJson = [
                'result' => "/wines/$vivino->vintage_id",
                "status" => "ok",
                "message" => "Получена ссылка vivino /wines/$vivino->vintage_id",
                "product_id"=> $vivino->product_id
            ];
        }
    }

}
