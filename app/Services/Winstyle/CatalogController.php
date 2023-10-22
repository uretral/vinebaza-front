<?php


namespace App\Services\Winstyle;

use App\Data\Parser\ItemRawData;
use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use App\Models\Donors\DonorProduct;
use App\Models\Props\PropExpertsRating;
use App\Models\Props\PropStock;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    protected $category_id;
    protected $donor_id;
    protected $country;
    protected $region;
    protected $sub_region;
    public $catalogItems = [];
    public $result = [
        'product_created' => [],
        'donor_product_created' => [],
        'donor_price_updated' => [],
        'errors' => [],
    ];


    public function __construct($url, $donor_id, $category_id, $ses_id = 458587, $proxy = '')
    {

        $this->donor_id = $donor_id;
        $this->category_id = $category_id;

//        $link = CasperController::simple($url);


        $crawler = new Crawler($this->content($url));

        $this->catalogItems = $crawler->filter('form.item-block')->each(function (Crawler $node, $i) {
            return new CatalogItemController($node);
        });

        $this->doStaff();
    }

    public function content($pageNr): string
    {
        try {
            Artisan::call('winstyle:catalog', ['page' => $pageNr]);
            return Artisan::output();
        } catch (\Exception $e) {
            dd($e);
        }


    }

    public function doStaff()
    {
        foreach ($this->catalogItems as $k => $item) {

            $findProduct = Product::whereCode($item->code)->first();
            $findDonorProduct = DonorProduct::whereCode($item->code)->first();

            if ($findProduct && $findDonorProduct) {
                $this->updateDonorProduct($item); // обновить цены
                if ($findProduct->status == 0) {
                    array_push($this->result['product_created'], $findProduct->toArray());
                }
            } elseif (is_null($findProduct) && $findDonorProduct) {
                $this->createProduct($item);//новый  продукт
                $this->updateDonorProduct($item); // обновить цены
            } else {
                $productID = $this->createProduct($item);//новый  продукт
                $this->createDonorProduct($item, $productID);// новый  донор
            }
        }
    }

    public function createDonorProduct($item, $product_id)
    {
        $createdDonorProduct = DonorProduct::create([
            'product_id' => $product_id,
            'category_id' => $this->category_id,
            'donor_id' => $this->donor_id,
            'code' => $item->code,
            'articul' => $item->articul,
            'stock' => $this->stock($item),
            'url' => $item->url,
            'price' => $item->price ? (int)$item->price : 0,
            'price_discount' => $item->price_discount ? (int)$item->price_discount : 0,
        ]);
        array_push($this->result['donor_product_created'], $createdDonorProduct->toArray());
        return $createdDonorProduct->id;
    }

    public function updateDonorProduct($item)
    {
        $updatePrices = DonorProduct::whereCode($item->code)->update([
            'stock' => $this->stock($item),
            'price' => $item->price ? (int)$item->price : 0,
            'price_discount' => $item->price_discount ? (int)$item->price_discount : 0,
        ]);
        array_push($this->result['donor_price_updated'], $item->code);
        return $updatePrices;
    }

    public function createProduct($item)
    {
        $this->country = null;
        $this->region = null;
        $this->sub_region = null;
        $createdProduct = Product::create([
            'name' => $item->name,
            'slug' => Str::slug($item->name, '-', 'en'),
            'translit' => $item->translit,
            'articul' => $item->articul,
            'code' => $item->code,
            'category_id' => $this->category_id,
            'winestyle_link' => $item->url,
        ]);
        $this->expertsRating($item, $createdProduct->id);

        array_push($this->result['product_created'], $createdProduct->toArray());
        return $createdProduct->id;
    }

    public function expertsRating($item, $product_id)
    {
        foreach ($item->experts_rating as $rating) {
            PropExpertsRating::create([
                'product_id' => $product_id,
                'name' => $rating['name'],
                'rating' => $rating['rating'],
            ]);

        }

    }

    /**
     * @param $item
     * @return int|mixed|string
     */
    public function stock($item)
    {

        if (is_null($item->stock)) {
            return null;
        }

        $prop = PropStock::whereCode($item->stock)->first();
        if (is_null($prop)) {
            $prop = PropStock::create([
                'code' => $item->stock
            ]);
        }
        return $prop->id;
    }

}
