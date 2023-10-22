<?php


namespace App\Services\Winstyle;


use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use App\Models\Donors\Winestyle\Review;
use App\Models\Parser\ParserLog;
use App\Models\Props\PropBrand;
use App\Models\Props\PropColor;
use App\Models\Props\PropCountry;
use App\Models\Props\PropGrape;
use App\Models\Props\PropManufacturers;
use App\Models\Props\PropPairing;
use App\Models\Props\PropRegion;
use App\Models\Props\PropSubRegion;
use App\Models\Props\PropTaste;
use App\Models\Props\PropType;
use App\Models\System\File;
use Intervention\Image\ImageManager;
use Symfony\Component\DomCrawler\Crawler;
use Storage;

class ItemFixController extends Controller
{
    public $link;
    public $product_id;
    public $ses_id;
    public $page_error = [];
    public $nodes_error = [];

    public $pictures = [];
    public $reviews = [];
    public $model;

    public $item = [
        "color"               => [],
        "sugar"               => [],
        "country"             => [],
        "region"              => [],
        "sub_region"          => [],
        "brand"               => [],
        "manufacturer"        => [],
        "strength"            => null,
        "volume"              => [],
        "grape"               => [],
        "tastes"              => [],
        "pairings"            => [],
        "notes_color"         => null,
        "notes_taste"         => null,
        "notes_aroma"         => null,
        "notes_pairing"       => null,
        "facts"               => null,
        "manufacturerText"    => null,
        "color_depth"         => null,
        "richness"            => null,
        "serving_temperature" => null,
        "manufacturer_site"   => null,
        "reviews"             => []
    ];

    public $product = [
        // props
        'color_id'            => null,
        'sugar_id'            => null,
        'country_id'          => null,
        'region_id'           => null,
        'sub_region_id'       => null,
        'manufacturer_id'     => null,
        'brand_id'            => null,

        // simple
        'strength'            => null,
        'volume'              => null,
        'volume_type'         => null,
        'notes_color'         => null,
        'notes_taste'         => null,
        'notes_aroma'         => null,
        'notes_pairing'       => null,
        'color_depth'         => null,
        'richness'            => null,
        'serving_temperature' => null,
        'storage_capacity'    => null,
        'facts'               => null,
        'grapes'              => null,
        'grape_percentage'    => null,
        'pairings'            => null,
        'tastes'              => null,
        'status'              => null,

    ];



    public function __construct($link, $product_id, $ses_id = ''){
        $this->link = $link;
        $this->product_id = $product_id;
        $this->ses_id = $ses_id;

        $lll = CasperController::simple($link);

        $crawler = new Crawler($lll);
        if($crawler->filter('.cart-empty')->count()){
            $this->page_error = ParserLog::create([
                'code'    => 404,
                'message' => 'Page not found',
                'node'    => '',
                'url'     => $link,
                'entity'  => 'product',
                'ses_id'  => $ses_id,
            ]);
        } else {
            $this->parseProduct($crawler);
        }

        return $this;
    }

    public function parseProduct($crawler){
        $this->listDescription($crawler);
        $this->pictures($crawler);
        $this->tastesAndPairings($crawler);
        $this->notes($crawler);
        $this->articlesContainer($crawler);
        $this->listCharacteristics($crawler);
        $this->reviews($crawler);
        $this->prepare();
        if(is_null($this->product['volume'])){
            $this->product['status'] = 0;
        } else {
            $this->product['status'] = 1;
        }
        $this->save();
        return $this;
    }




    public function imageSave($path,$key){
        try {
            $manager = new ImageManager(array('driver' => 'gd'));
            $arrPath = explode('.',$path);
            $ext = array_pop($arrPath);
            $filename = $this->product_id.'_'.$key.'.'.$ext;

            $imgOriginal = $manager->make($path);
            $imgOriginal->response($ext);

            $imgMiddle = $manager->make($path);
            $imgMiddle->resize(null, '452', function ($constraint) {
                $constraint->aspectRatio();
            })->response($ext);

            $imgThumb = $manager->make($path);
            $imgThumb->resize(null, '185', function ($constraint) {
                $constraint->aspectRatio();
            })->response($ext);

            \Storage::disk('public')->put('/uploads/product/middle/' . $filename,  $imgMiddle);
            \Storage::disk('public')->put('/uploads/product/thumb/' . $filename,  $imgThumb);

            $file = File::where('name',$filename)->first();

            if(\Storage::disk('public')->put('/uploads/product/orig/' . $filename,  $imgOriginal) && is_null($file)){
                File::create([
                    'product_id' => $this->product_id,
                    'name' => $filename,
                    'type' => 'image',
                    'from' => 'winestyle',
                ]);
            }

        } catch (\Exception $error) {
            dump($error);
        }
    }


    public function reviewsSave(){
        foreach ($this->reviews as $r){
            Review::create([
                'product_id' => $this->product_id,
                'name' => $r['name'],
                'date' => $r['date'],
                'rate' => $r['rate'],
                'text' => $r['text'],
            ]);
        }
    }

    public function manufacturerCheck(){
        if($this->product['manufacturer_id']){
            $manufacturer = PropManufacturers::whereId($this->product['manufacturer_id'])->first();

            if($this->item['manufacturer_site'] && is_null($manufacturer->site)) {
                $manufacturer->site = $this->item['manufacturer_site'];
            }
            if($this->item['manufacturerText'] && is_null($manufacturer->text_product)) {
                $manufacturer->text_product = $this->item['manufacturerText'];
            }
            $manufacturer->save();
        }
    }

    public function save(){
// pictures
        foreach ($this->pictures as $k => $path){
            $this->imageSave($path,$k);
        }
// product
        Product::where('id',$this->product_id)->update($this->product);
        $this->reviewsSave();
        $this->manufacturerCheck();

        $this->model = Product::whereId($this->product_id)->first();
    }

    public function pictures(Crawler $crawler){
        $this->pictures = [];
        $crawler->filter('.left-aside_no-bg a')->each(function (Crawler $node){
            array_push($this->pictures,$node->attr('href'));
        });
    }

    public function listDescription(Crawler $crawler){
        if($crawler->filter('.list-description li')->count()){
            $crawler->filter('.list-description li')->each(function (Crawler $node){
                if(strpos( $node->text(),'Вино:') !== false){
                    if( $node->filter('a')->eq(0)->count()){ // color
                        $this->item['color']['name'] = $node->filter('a')->eq(0)->text();
                        $this->item['color']['url'] = $node->filter('a')->eq(0)->attr('href');
                    }
                    if( $node->filter('a')->eq(1)->count()){ // sugar
                        $this->item['sugar']['name'] = $node->filter('a')->eq(1)->text();
                        $this->item['sugar']['url'] = $node->filter('a')->eq(1)->attr('href');
                    }
                }
                if(strpos( $node->text(),'Регион:') !== false){
                    if( $node->filter('a')->eq(0)->count()){ // country
                        $this->item['country']['name'] = $node->filter('a')->eq(0)->text();
                        $this->item['country']['url'] = $node->filter('a')->eq(0)->attr('href');
                    }
                    if( $node->filter('a')->eq(1)->count()){ // region
                        $this->item['region']['name'] = $node->filter('a')->eq(1)->text();
                        $this->item['region']['url'] = $node->filter('a')->eq(1)->attr('href');
                    }
                    if( $node->filter('a')->eq(2)->count()){ // sub_region
                        $this->item['sub_region']['name'] = $node->filter('a')->eq(2)->text();
                        $this->item['sub_region']['url'] = $node->filter('a')->eq(2)->attr('href');
                    }
                }
                if(strpos( $node->text(),'Производитель:') !== false){

                    if( $node->filter('a')->eq(0)->count()){ // manufacturer
                        $this->item['manufacturer']['name'] = $node->filter('a')->eq(0)->text();
                        $this->item['manufacturer']['url'] = $node->filter('a')->eq(0)->attr('href');
                    }
                    if( $node->filter('span.ll_link')->eq(0)->count()){ // manufacturer
                        $this->item['manufacturer']['name'] = $node->filter('span.ll_link')->eq(0)->text();
                        $this->item['manufacturer']['url'] = $node->filter('span.ll_link')->eq(0)->attr('data-href');
                    }
                }
                if(strpos( $node->text(),'Бренд:') !== false){
                    if( $node->filter('a')->eq(0)->count()){ // brand
                        $this->item['brand']['name'] = $node->filter('a')->eq(0)->text();
                        $this->item['brand']['url'] = $node->filter('a')->eq(0)->attr('href');
                    }
                }

                if(strpos( $node->text(),'Крепость') !== false){
                    if( $node->filter('a')->eq(0)->count()){ // strength
                        $this->item['strength'] = Helper::floats($node->filter('a')->eq(0)->text());
                        $this->product['strength'] = $this->item['strength'];
                    }

                }
                if(strpos( $node->text(),'Объем:') !== false){
                    if( $node->filter('a')->eq(0)->count()){ // volume
                        $rawVolume =  $node->filter('a')->eq(0)->text();
                        $rawVolume = explode(' ',$rawVolume);
                        $this->item['volume']['value'] = $rawVolume[0];
                        $this->item['volume']['volume_type'] = $rawVolume[1];
                        $this->product['volume'] = $this->item['volume']['value'];
                        $this->product['volume_type'] = $this->item['volume']['volume_type'];
                    }
                }
                if(strpos( $node->text(),'Виноград:') !== false){
                    if($node->filter('a')->count()){
                        $node->filter('a')->each(function (Crawler $a, $i){
                            $this->item['grape'][$i] = [];
                            $this->item['grape'][$i]['name'] = $a->text();
                            $this->item['grape'][$i]['url'] = $a->attr('href');
                            $this->item['grape'][$i]['percentage'] = '';
                        });
                    }

                    if( $node->filter('a')->count()){ // grape
                        $node->filter('a')->each(function (Crawler $cr){
                            foreach ($cr as $node) {
                                $node->parentNode->removeChild($node);
                            }
                        });
                        $percentageRawText = $node->filter('div.links')->eq(0)->text();
                        $percentageRawText = explode(',',$percentageRawText);
                        foreach ($percentageRawText as $k => $percent){
                            $this->item['grape'][$k]['percentage'] = Helper::floats($percent);
                        }

                    }
                }
            });
        }


    }

    public function tastesAndPairings(Crawler $crawler){
        if($crawler->filter('.tag-block')->count()){
            $crawler->filter('.tag-block')->each(function (Crawler $node){
                $span = $node->filter('span');

                if($span->count()){

                    if(strpos($span->eq(0)->text(),'Вкус') !== false) {

                        $node->filter('a')->each(function (Crawler $a, $i){

                            $this->item['tastes'][$i] = [
                                'name' => trim($a->text()),
                                'url' => $a->attr('href'),
                            ];

                        });

                    } elseif (strpos($span->eq(0)->text(),'Подходит') !== false){

                        $node->filter('a')->each(function (Crawler $a, $i){

                            $this->item['pairings'][$i] = [
                                'name' => trim($a->text()),
                                'url' => $a->attr('href'),
                            ];

                        });

                    }

                }
            });
        }



    }

    public function notes(Crawler $crawler){
        $d = $crawler->filter('.description-block')->each(function (Crawler $block){
            $span = $block->filter('span');
            if($span->count() && strpos($span->eq(0)->text(),'Цвет') !== false){ // color
                if( $block->filter('p')->count()){
                    $this->item['notes_color'] = trim($block->filter('p')->eq(0)->text());
                    $this->product['notes_color'] = $this->item['notes_color'];
                }
            }
            if($span->count() && strpos($span->eq(0)->text(),'Вкус') !== false){ // taste
                if( $block->filter('p')->count()){
                    $this->item['notes_taste'] = trim($block->filter('p')->eq(0)->text());
                    $this->product['notes_taste'] = $this->item['notes_taste'];
                }
            }
            if($span->count() && strpos($span->eq(0)->text(),'Аромат') !== false){ // aroma
                if( $block->filter('p')->count()){
                    $this->item['notes_aroma'] = trim($block->filter('p')->eq(0)->text());
                    $this->product['notes_aroma'] = $this->item['notes_aroma'];
                }
            }
            if($span->count() && strpos($span->eq(0)->text(),'Гастрономические') !== false){ // pairings
                if( $block->filter('p')->count()){
                    $this->item['notes_pairing'] = trim($block->filter('p')->eq(0)->text());
                    $this->product['notes_pairing'] = $this->item['notes_pairing'];
                }
            }
        });
    }

    public function articlesContainer(Crawler $crawler){
        if($crawler->filter('.articles-container')->count()){
            $crawler->filter('.articles-container')->each(function (Crawler $node){ // Интересные факты
                $h2 = $node->filter('h2');
                if($h2->count() && strpos($h2->eq(0)->text(),'Интересные факты') !== false){
                    if($node->filter('.description-block')->count()){
                        $this->item['facts'] = $node->filter('.description-block')->html();
                        $this->product['facts'] = $this->item['facts'];

                    }
                }
                if($h2->count() && strpos($h2->eq(0)->text(),'О производителе') !== false){
                    if($node->filter('.description-block')->count()){
                        $this->item['manufacturerText'] = $node->filter('.description-block')->html();
                    }
                }
            });
        }

    }

    public function listCharacteristics(Crawler $crawler){
        if($crawler->filter('.list-characteristics li')->count()){
            $crawler->filter('.list-characteristics li')->each(function (Crawler $li){
                $span = $li->filter('span.name');
                if($span->count() && strpos($span->eq(0)->text(),'Глубина цвета') !== false){
                    $li->filter('span')->each(function (Crawler $h){
                        foreach ($h as $node) {
                            $node->parentNode->removeChild($node);
                        }
                    });
                    $this->item['color_depth'] = Helper::specialChars($li->text());
                    $this->product['color_depth'] = $this->item['color_depth'];
                }
                if($span->count() && strpos($span->eq(0)->text(),'Тело/Насыщенность') !== false){
                    $li->filter('span')->each(function (Crawler $h){
                        foreach ($h as $node) {
                            $node->parentNode->removeChild($node);
                        }
                    });
                    $this->item['richness'] = Helper::specialChars($li->text());
                    $this->product['richness'] = $this->item['richness'];
                }
                if($span->count() && strpos($span->eq(0)->text(),'Температура сервировки') !== false){
                    $li->filter('span')->each(function (Crawler $h){
                        foreach ($h as $node) {
                            $node->parentNode->removeChild($node);
                        }
                    });
                    $this->item['serving_temperature'] = Helper::specialChars($li->text());
                    $this->product['serving_temperature'] = $this->item['serving_temperature'];
                }
                if($span->count() && strpos($span->eq(0)->text(),'Сайт производителя') !== false){
                    $li->filter('span')->each(function (Crawler $h){
                        foreach ($h as $node) {
                            $node->parentNode->removeChild($node);
                        }
                    });
                    $this->item['manufacturer_site'] = Helper::specialChars($li->text());

                }
                if($span->count() && strpos($span->eq(0)->text(),'В коробке') !== false){
                    $li->filter('span')->each(function (Crawler $h){
                        foreach ($h as $node) {
                            $node->parentNode->removeChild($node);
                        }
                    });
                    $this->item['storage_capacity'] = Helper::specialChars($li->text());
                    $this->product['storage_capacity'] = $this->item['storage_capacity'];
                }
            });
        }


    }

    public function reviews(Crawler $crawler){
        $this->item['reviews'] = [];
        if( $crawler->filter('.review-block-page .review-block')->count()){
            $crawler->filter('.review-block-page .review-block')->each(function (Crawler $node, $i){




                $review = [
                    'name' => $node->filter('.name')->count() ? $node->filter('.name')->eq(0)->text() : '',
                    'date' => $node->filter('.date')->count() ? $node->filter('.date')->eq(0)->text() : '',
                    'rate' => $node->filter('.rating-text > .text')->count() ? $node->filter('.rating-text > .text')->eq(0)->text() : '',
                    'text' => $node->filter('div.text ')->count() ? Helper::brackets($node->filter('div.text ')->eq(0)->html()) : '',
                ];
                $this->item['reviews'][$i] = $review;
            });
        }
    }


    public function prepare(){
        // color
        if($this->item['color']){
            $color = PropColor::whereNameRu($this->item['color']['name'])->first();
            if(is_null($color)){
                $propContent = PropsController::blockCollapsed($this->item['color']['url']);
                $color = PropColor::create([
                    'name_ru' => $this->item['color']['name'],
                    'url' => $this->item['color']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['color_id'] = $color->id;
        }

        // sugar
        if($this->item['sugar']){
            $sugar = PropType::whereNameRu($this->item['sugar']['name'])->first();
            if(is_null($sugar)){
                $propContent = PropsController::blockCollapsed($this->item['sugar']['url']);
                $sugar = PropType::create([
                    'name_ru' => $this->item['sugar']['name'],
                    'url' => $this->item['sugar']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['sugar_id'] = $sugar->id;
        }

        // country
        if($this->item['country']){
            $country = PropCountry::whereNameRu($this->item['country']['name'])->first();
            if(is_null($country)){
                $propContent = PropsController::blockCollapsed($this->item['country']['url']);
                $country = PropCountry::create([
                    'name_ru' => $this->item['country']['name'],
                    'url' => $this->item['country']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['country_id'] = $country->id;
        }

        // region
        if($this->item['region']){
            $region = PropRegion::whereNameRu($this->item['region']['name'])->first();
            if(is_null($region)){
                $propContent = PropsController::blockCollapsed($this->item['region']['url']);
                $region = PropRegion::create([
                    'name_ru' => $this->item['region']['name'],
                    'country_id' => $this->product['country_id'],
                    'url' => $this->item['region']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['region_id'] = $region->id;
        }

        // sub_region
        if($this->item['sub_region']){
            $sub_region = PropSubRegion::whereNameRu($this->item['sub_region']['name'])->first();
            if(is_null($sub_region)){
                $propContent = PropsController::blockCollapsed($this->item['sub_region']['url']);
                $sub_region = PropSubRegion::create([
                    'name_ru' => $this->item['sub_region']['name'],
                    'country_id' => $this->product['country_id'],
                    'region_id' => $this->product['region_id'],
                    'url' => $this->item['sub_region']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['sub_region_id'] = $sub_region->id;
        }

        // manufacturer
        if($this->item['manufacturer']){
            $manufacturer = PropManufacturers::whereName($this->item['manufacturer']['name'])->first();
            if(is_null($manufacturer)){
                $propContent = PropsController::blockCollapsed($this->item['manufacturer']['url']);
                $manufacturer = PropManufacturers::create([
                    'name' => $this->item['manufacturer']['name'],
                    'country_id' => $this->product['country_id'],
                    'region_id' => $this->product['region_id'],
                    'sub_region_id' => $this->product['sub_region_id'],
                    'url' => $this->item['manufacturer']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['manufacturer_id'] = $manufacturer->id;
        }

        // brand
        if($this->item['brand']){
            $brand = PropBrand::whereName($this->item['brand']['name'])->first();
            if(is_null($brand)){
                $propContent = PropsController::blockCollapsed($this->item['brand']['url']);
                $brand = PropBrand::create([
                    'name' => $this->item['brand']['name'],
                    'country_id' => $this->product['country_id'],
                    'region_id' => $this->product['region_id'],
                    'sub_region_id' => $this->product['sub_region_id'],
                    'url' => $this->item['brand']['url'],
                    'text' => is_null($propContent) ? '' : $propContent
                ]);
            }
            $this->product['brand_id'] = $brand->id;
        }

        // grapes

        if($this->item['grape']){
            $arGrapeIDs = [];
            $arGrapeIPercentage = [];
            foreach ($this->item['grape'] as $grapeType) if(array_key_exists('name',$grapeType)) {
                $grape = PropGrape::whereNameRu($grapeType['name'])->first();
                if(is_null($grape)){
                    $propContent = PropsController::blockCollapsed($grapeType['url']);
                    $grape = PropGrape::create([
                        'name_ru' => $grapeType['name'],
                        'url' => $grapeType['url'],
                        'text' => is_null($propContent) ? '' : $propContent
                    ]);
                }
                $arGrapeIDs[] = $grape->id;
                $arGrapeIPercentage[] = [
                    'id' => $grape->id,
                    'percent' => $grapeType['percentage']
                ];
            }
            $this->product['grapes'] = implode(',',$arGrapeIDs);
            $this->product['grape_percentage'] = json_encode($arGrapeIPercentage);

        }

        // tastes
        if ($this->item['tastes']) {
            $arTastesIDs = [];
            foreach ($this->item['tastes'] as $type) {
                $prop = PropTaste::whereNameRu($type['name'])->first();
                if (is_null($prop)) {
                    $prop = PropTaste::create([
                        'name_ru' => $type['name'],
                        'url'     => $type['url'],
                    ]);
                }
                $arTastesIDs[] = $prop->id;
            }
            $this->product['tastes'] = implode(',',$arTastesIDs);
        }

        // pairings
        if ($this->item['pairings']) {
            $arPairingsIDs = [];
            foreach ($this->item['pairings'] as $type) {
                $prop = PropPairing::whereNameRu($type['name'])->first();
                if (is_null($prop)) {
                    $prop = PropPairing::create([
                        'name_ru' => $type['name'],
                        'url'     => $type['url'],
                    ]);
                }
                $arPairingsIDs[] = $prop->id;
            }
            $this->product['pairings'] = implode(',',$arPairingsIDs);
        }

    }
}
