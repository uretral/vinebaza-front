<?php

namespace App\Services\Vivino\Processing;

use App\Classes\DataBaseCookie;
use App\Data\Parser\ParseResultData;
use App\Data\VivinoJson\CountryData;
use App\Data\VivinoJson\GrapeData;
use App\Data\VivinoJson\RegionData;
use App\Data\VivinoJson\ReviewData;
use App\Data\VivinoJson\StructureData;
use App\Data\VivinoJson\StyleData;
use App\Data\VivinoJson\TasteData;
use App\Data\VivinoJson\VintageData;
use App\Data\VivinoJson\WineData;
use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Models\Vivino\Wine;
use App\Models\Vivino\WineStatistics;
use App\Services\Vivino\Saving\Country;
use App\Services\Vivino\Saving\Flavor;
use App\Services\Vivino\Saving\Food;
use App\Services\Vivino\Saving\Grape;
use App\Services\Vivino\Saving\Images;
use App\Services\Vivino\Saving\Region;
use App\Services\Vivino\Saving\Review;
use App\Services\Vivino\Saving\Structure;
use App\Services\Vivino\Saving\Style;
use App\Services\Vivino\Saving\Vintage;
use App\Services\Vivino\Saving\Winery;
use Spatie\LaravelData\DataCollection;


class Info extends DataBaseCookie
{
    protected string $filepathInfo;
    protected \stdClass $info;
    protected WineData $wine;
    protected VintageData $vintage;
    protected DataCollection $grapes;
    protected DataCollection $regions;
    protected DataCollection $vintages;
    protected TasteData $tastes;
    protected DataCollection $reviews;
    protected DataCollection $tastes_reviews;

    public Product $product;
    protected ParseResultData $resultData;

    protected ?int $food = null;

    public function __construct(ParseResultData $resultData)
    {
        $this->resultData = $resultData;
        $this->ComputedCookieComponent = 'VivinoParse';
        $this->ComputedCookieProperty = self::class;
    }

    public function handle(): string
    {
        $this->product = Product::find($this->resultData->product_id);
        $this->getJson();
        $this->vivino();


//        $this->checkJsons();


        return self::class; // important
    }

    public function vivino()
    {
        $this->wine();

        $vivinoArray = [];

        $vivinoArray['country'] = Country::handle($this->wine->region->country);

        if (count($this->grapes))
            $vivinoArray['grapes'] = Grape::handle($this->grapes, $this->wine->id, $this->wine->grapes);

        if (count($this->wine->foods))
            $vivinoArray['food'] = Food::handle($this->wine->foods, $this->wine->id);

        if (count($this->regions))
            $vivinoArray['region'] = Region::handle($this->regions);

        if (isset($this->wine->style) && !\App\Models\Vivino\Style::find($this->wine->style->id))
            $vivinoArray['style'] = Style::handle($this->wine->style);

        if (isset($this->wine->winery) && !\App\Models\Vivino\Winery::find($this->wine->winery->id))
            $vivinoArray['winery'] = Winery::handle($this->wine->winery);

        if (isset($this->vintages))
            $vivinoArray['vintages'] = Vintage::handle($this->vintages, $this->wine->id);

        if (isset($this->tastes->flavor))
            $vivinoArray['flavor'] = Flavor::handle($this->tastes->flavor, $this->wine->id);

        if (isset($this->tastes->structure))
            $vivinoArray['structure'] = Structure::handle($this->tastes->structure, $this->wine->id);

        if (isset($this->tastes_reviews))
            $vivinoArray['tastesReview'] = Review::handle($this->tastes_reviews, $this->wine->id);

        if (isset($this->reviews))
            $vivinoArray['reviews'] = Review::handle($this->reviews, $this->wine->id);


        Vivino::updateOrCreate([
            'product_id' => $this->product->id,
            'wine_id' => $this->wine->id,
            'vintage_id' => $this->vintage->id,
        ], $vivinoArray
        /* ['food' => Food::handle($this->wine->foods, $this->wine->id),
         'grapes' => Grape::handle($this->grapes, $this->wine->id, $this->wine->grapes),
         'region' => Region::handle($this->regions),
         'country' => Country::handle($this->wine->region->country) ]*/
        );
    }

    public function wine()
    {

        Wine::updateOrCreate([
            'id' => $this->wine->id
        ], [
            'alcohol' => $this->wine->alcohol,
            'closure' => $this->wine->closure,
            'created' => $this->wine->created_at,
            'updated' => $this->wine->updated_at,
            'description' => $this->wine->description,
            'has_valid_ratings' => $this->wine->has_valid_ratings,
            'hidden' => $this->wine->hidden,
            'is_first_wine' => $this->wine->is_first_wine,
            'is_natural' => $this->wine->is_natural,
            'name' => $this->wine->name,
            'non_vintage' => $this->wine->non_vintage,
            'review_status' => $this->wine->review_status,
            'seo_name' => $this->wine->seo_name,
            'sweetness_id' => $this->wine->sweetness_id,
            'type_id' => $this->wine->type_id,
            'vintage_mask_raw' => $this->wine->vintage_mask_raw,
            'vintage_type' => $this->wine->vintage_type,
        ]);

        if (isset($this->wine->statistics)) {
            WineStatistics::updateOrCreate(
                ['wine_id' => $this->wine->id],
                [
                    'labels_count' => $this->wine->statistics->labels_count,
                    'ratings_average' => $this->wine->statistics->ratings_average,
                    'ratings_count' => $this->wine->statistics->ratings_count,
                    'status' => $this->wine->statistics->status,
                    'vintages_count' => $this->wine->statistics->vintages_count,
                ]
            );
        }

    }

    public function vintage()
    {
        return;
    }


    public function getJson()
    {
        $this->info = json_decode(file_get_contents(public_path('storage' . $this->resultData->filepathInfo)));

        $this->wine = WineData::from($this->info->wine);
        $this->vintage = VintageData::from($this->info->vintage);
        $this->grapes = GrapeData::collection($this->info->grapes);
        $this->regions = RegionData::collection($this->info->regions);
        $this->vintages = VintageData::collection($this->info->vintages);

        $this->tastes = isset($this->info->tastes) ? TasteData::from($this->info->tastes) : null;
        $this->reviews = isset($this->info->reviews) ? ReviewData::collection($this->info->reviews) : null;
        $this->tastes_reviews = isset($this->info->reviews_with_flavor) ? ReviewData::collection($this->info->reviews_with_flavor) : null;


        dump($this->wine->toArray());
        dump($this->info);


    }


    public function checkJsons()
    {
        $files = scandir(public_path('storage/vivino/json/'));
        $checkArray = [];

        foreach ($files as $key => $filename) if (str_contains($filename, 'json')) {
            $file = json_decode(file_get_contents(public_path('storage/vivino/json/' . $filename)));

            $ent = 'vintage_type';

            if (isset($file?->info?->wine->{$ent}))
                if ($file?->info?->wine?->{$ent} && !in_array($file?->info?->wine?->{$ent}, $checkArray)) {
                    $checkArray[] = $file?->info?->wine?->{$ent};
                }
        }

        dump($checkArray);
    }
}
