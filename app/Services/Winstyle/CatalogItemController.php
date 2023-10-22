<?php


namespace App\Services\Winstyle;


use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;

class CatalogItemController extends Controller
{


    public $slug;
    public $name;
    public $translit;
    public $articul;
    public $code;
    public $url;
    public $experts_rating;
    public $volume;
    public $volume_type;
    // regions
    public $country;
    public $region;
    public $sub_region;

    public $manufacturer;
    public $brand;
    public $strength;

    public $grapes = [];
    public $type;
    public $color;

    public $price;
    public $price_discount;
    public $stock;


    public $picture_small;

    /*
        public $product_id;
        public $category_id;
        public $donor_id;

        public $discount_rule;*/




    function __construct(Crawler $node)
    {

        $node->filter('.price span')->each(function (Crawler $cr){
            foreach ($cr as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        $node->filter('.price-old span')->each(function (Crawler $cr){
            foreach ($cr as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        $node->filter('.item-header .sku')->each(function (Crawler $cr){
            foreach ($cr as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        $node->filter('.stock.has-hover span')->each(function (Crawler $cr){
            foreach ($cr as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        $this->name($node);
        $this->translit = $this->translit($node);
        $this->slug = $this->translit;
        $this->articul = $this->articul($node);
        $this->code = (int)$node->attr('data-prodid');
        $this->url = $node->filter('p.title > a')->eq(0)->attr('href');
        $this->experts_rating = $this->expertsRating($node);
        $this->volume($node);
        $this->listDescription($node);
        $this->price($node);
        $this->priceDiscount($node);
        $this->stock($node);
        $this->imgUrl($node);
    }

    public function name(Crawler $node){
        try {
            $this->name =  Helper::specialChars($node->filter('p.title > a')->eq(0)->text());
        } catch (\Exception $error){


        }

    }
    public function translit(Crawler $node){
        return Helper::specialChars($node->filter('.meta > a')->eq(0)->text());
    }
    public function articul(Crawler $node){
        return Helper::specialChars($node->filter('.item-header .meta')->eq(0)->text());
    }
    public function expertsRating(Crawler $node){
        return $node->filter('.info-block.rating-block .rating-name')->each(function (Crawler $subNode) {
            return [
                'name'  => Helper::specialChars($subNode->filter('span')->eq(0)->text()),
                'rating' => Helper::specialChars($subNode->filter('span')->eq(1)->text()),
            ];
        });
    }
    public function volume(Crawler $node){
        $volume = $node->filter('.volume-block label')->eq(0)->text();
        $volume = str_replace('Объем','',$volume);
        $volume = explode(' ',$volume);
        $this->volume = $volume[0];
        $this->volume_type = $volume[1];
    }

    public function listDescription(Crawler $node){
        $node->filter('.list-description li')->each(function (Crawler $node){
            $name = $node->filter('.name')->text();
            switch ($name) {
                case strpos($name,'Регион'):
                    $cnt = $node->filter('a')->count();
                    for ($item = 0; $item < $cnt; $item ++){
                        if($item == 0){
                            $this->country = [
                                'name_ru' => $node->filter('a')->eq($item)->text(),
                                'url' => $node->filter('a')->eq($item)->attr('href'),
                            ];
                        } elseif ($item == 1) {
                            $this->region = [
                                'name_ru' => $node->filter('a')->eq($item)->text(),
                                'url' => $node->filter('a')->eq($item)->attr('href'),
                            ];
                        } elseif ($item == 2) {
                            $this->sub_region = [
                                'name_ru' => $node->filter('a')->eq($item)->text(),
                                'url' => $node->filter('a')->eq($item)->attr('href'),
                            ];
                        }
                    }
                    break;
                case strpos($name,'Производитель'):
                    if($node->filter('a')->count()){
                        $this->manufacturer = [
                            'name' => $node->filter('a')->eq(0)->text(),
                            'url' => $node->filter('a')->eq(0)->attr('href'),
                        ];
                    }
                    break;
                case strpos($name,'Бренд'):
                    if($node->filter('a')->count()){
                        $this->brand = [
                            'name' => $node->filter('a')->eq(0)->text(),
                            'url' => $node->filter('a')->eq(0)->attr('href'),
                        ];
                    }
                    break;
                case strpos($name,'Крепость'):
                    if($node->filter('a')->count()){
                        $this->strength = Helper::floats($node->filter('a')->eq(0)->text());
                    }
                    break;
                case strpos($name,'Сорт винограда'):
                    $cnt = $node->filter('a')->count();
                    for ($item = 0; $item < $cnt; $item ++){
                        $this->grapes[] = [
                            'name_ru' => $node->filter('a')->eq($item)->text(),
                            'url' => $node->filter('a')->eq($item)->attr('href'),
                        ];
                    }
                    break;
                case strpos($name,'Вино'):
                    $cnt = $node->filter('a')->count();
                    for ($item = 0; $item < $cnt; $item ++){
                        if($item == 0){
                            $this->color = [
                                'name_ru' => $node->filter('a')->eq($item)->text(),
                                'url' => $node->filter('a')->eq($item)->attr('href'),
                            ];
                        } elseif ($item == 1) {
                            $this->type = [
                                'name_ru' => $node->filter('a')->eq($item)->text(),
                                'url' => $node->filter('a')->eq($item)->attr('href'),
                            ];
                        }
                    }
                    break;
                default:
                    break;
            }
        });
    }

    public function price(Crawler $node){
        $this->price = $node->filter('.price')->count() ? Helper::unbroken($node->filter('.price')->text())  : '';
    }
    public function priceDiscount(Crawler $node){
        $this->price_discount = $node->filter('.price-old')->count() ? Helper::unbroken($node->filter('.price-old')->text())  : '';
    }

    public function stock(Crawler $node){
        $stock = $node->filter('.stock.has-hover');
        if($stock->count()){
            $this->stock = (int)Helper::floats($stock->attr('data-avail'));
        }
    }

    public function imgUrl(Crawler $node){
        $this->picture_small = $node->filter('a.img-block img')->count() ? Helper::unbroken($node->filter('a.img-block img')->eq(0)->attr('src')) : '';
    }
}
