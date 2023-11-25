<?php

namespace App\Services\Vivino\Commands;

use App\Models\Catalog\Product;
use App\Services\Vivino\Selenium\VivinoSearch;

class Search
{
    public int $startNr;
    protected Product $product;
    protected string $searchString;

    public function __construct($startNr)
    {
        $this->startNr = $startNr;
    }

    public function getProduct(): void
    {
        $this->product = Product::whereId(
            Product::where('id', '>', $this->startNr)->min('id')
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
       return $content->handle($this->searchString);
    }

    public function handle(): array
    {
        $this->getProduct();
        $this->makeSearchString();
        return $this->getContent();
    }

}
