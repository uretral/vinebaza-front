<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\FoodData;
use App\Data\VivinoJson\GrapeData;
use App\Data\VivinoJson\StyleData;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\StyleBaselineStructure;
use App\Models\Vivino\StyleCountry;
use App\Models\Vivino\StyleFood;
use App\Models\Vivino\StyleGrape;
use App\Models\Vivino\StyleRegion;
use App\Models\Vivino\StyleStatistics;

class Style
{
    public static function handle(StyleData $styleData): int
    {
        self::style($styleData);
        self::statistics($styleData);
        self::region($styleData);
        self::grapes($styleData);
        self::food($styleData);
        self::country($styleData);
        self::baselineStructure($styleData);
        self::backgroundImage($styleData);
        return 1;
    }

    public static function style(StyleData $styleData): void
    {
        \App\Models\Vivino\Style::updateOrCreate(
            ['id' => $styleData->id],
            [
                'acidity' => $styleData->acidity,
                'acidity_description' => $styleData->acidity_description,
                'blurb' => $styleData->blurb,
                'body' => $styleData->body,
                'body_description' => $styleData->body_description,
                'description' => $styleData->description,
                'hidden' => $styleData->hidden,
                'name' => $styleData->name,
                'interesting_facts' => $styleData->interesting_facts,
                'parent_style_id' => $styleData->parent_style_id,
                'regional_name' => $styleData->regional_name,
                'seo_name' => $styleData->seo_name,
                'varietal_name' => $styleData->varietal_name,
                'vintage_mask' => $styleData->vintage_mask,
                'wine_type_id' => $styleData->wine_type_id,
            ]
        );


    }

    public static function statistics(StyleData $styleData): void
    {
        if (isset($styleData->statistics)) {
            StyleStatistics::updateOrCreate(
                ['style_id' => $styleData->id],
                [
                    'aggregated_wines_count' => $styleData->statistics->aggregated_wines_count,
                    'wines_count' => $styleData->statistics->wines_count,
                ]
            );
        }

    }

    public static function region(StyleData $styleData): void
    {
        if (isset($styleData->region)) {
            StyleRegion::updateOrCreate(
                ['style_id' => $styleData->id, 'region_id' => $styleData->region->id,]
            );
        }
    }

    public static function grapes(StyleData $styleData): void
    {
        if (isset($styleData->grapes) && $styleId = $styleData->id) {
            $styleData->grapes->each(function (GrapeData $grapeData) use ($styleId) {
                StyleGrape::updateOrCreate(
                    ['style_id' => $styleId, 'grape_id' => $grapeData->id,]
                );
            });
        }
    }

    public static function food(StyleData $styleData): void
    {
        if (isset($styleData->food) && $styleId = $styleData->id) {
            $styleData->food->each(function (FoodData $foodData) use ($styleId) {
                StyleFood::updateOrCreate(
                    ['style_id' => $styleId, 'food_id' => $foodData->id,]
                );
            });
        }
    }

    public static function country(StyleData $styleData): void
    {
        if (isset($styleData->country)) {
            StyleCountry::updateOrCreate(
                ['style_id' => $styleData->id, 'country_code' => $styleData->country->code,]
            );
        }
    }

    public static function baselineStructure(StyleData $styleData): void
    {
        if (isset($styleData->baseline_structure)) {
            StyleBaselineStructure::updateOrCreate(
                ['style_id' => $styleData->id],
                [
                    'acidity' => $styleData->baseline_structure->acidity,
                    'fizziness' => $styleData->baseline_structure->fizziness,
                    'intensity' => $styleData->baseline_structure->intensity,
                    'sweetness' => $styleData->baseline_structure->sweetness,
                    'tannin' => $styleData->baseline_structure->tannin,
                ]
            );

        }

    }


    public static function backgroundImage(StyleData $styleData): void
    {
        if (isset($styleData->background_image->location))
            BackgroundImage::updateOrCreate(
                [
                    "parent_id" => $styleData->id,
                    "model" => \App\Models\Vivino\Style::class
                ],
                [
                    "location" => $styleData->background_image->location
                        ? Images::save($styleData->background_image->location)
                        : null
                ]
            );
    }

}
