<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\BackgroundImageData;
use App\Data\VivinoJson\FoodData;
use App\Data\VivinoJson\ImageVariationsData;
use App\Models\Catalog\Product;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\WineFood;
use App\Services\Vivino\Saving\Images;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\DataCollection;

class Food
{
    public \App\Models\Vivino\Food $model;


    public static function handle(DataCollection $foods, int $wine_id): int
    {
        return $foods->each(function (FoodData $foodData) use ($wine_id) {
            self::food($foodData, $wine_id);
        })->count();
    }

    public static function food(FoodData $foodData, int $wine_id): void
    {
        $food = \App\Models\Vivino\Food::updateOrCreate([
            'id' => $foodData->id
        ], [
            "name" => $foodData->name,
            "seo_name" => $foodData->seo_name,
        ]);

        self::wine_woods($wine_id, $food->id);
        self::background_image($foodData);
    }

    public static function background_image(FoodData $foodData,): void
    {
        BackgroundImage::updateOrCreate([
            "parent_id" => $foodData->id,
            "model" => \App\Models\Vivino\Food::class
        ],["location" => $foodData->background_image->variations->small ? Images::save($foodData->background_image->variations->small) : null]);
    }

    public static function wine_woods($wine_id, $food_id): void
    {
        WineFood::updateOrCreate([
            'wine_id' => $wine_id,
            'food_id' => $food_id
        ]);
    }

    public static function variations(ImageVariationsData $imageVariationsData)
    {
        $variations = [
            "bottle_large" => null,
            "bottle_medium" => null,
            "bottle_medium_square" => null,
            "bottle_small" => null,
            "bottle_small_square" => null,
            "label" => null,
            "label_large" => null,
            "label_medium" => null,
            "label_medium_square" => null,
            "label_small_square" => null,
            "large" => null,
            "medium" => null,
            "medium_square" => null,
            "small_square" => null,
            "small" => "//images.vivino.com/backgrounds/foods/thumbs/8_lamb_932x810.png",
        ];

    }

}
