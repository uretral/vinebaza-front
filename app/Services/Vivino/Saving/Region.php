<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\GrapeData;
use App\Data\VivinoJson\RegionData;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\RegionCountry;
use App\Models\Vivino\RegionGrape;
use App\Models\Vivino\RegionStatistics;
use Spatie\LaravelData\DataCollection;

class Region
{

    public static function handle(DataCollection $regions): int
    {
        return $regions->each(function (RegionData $regionData) {
            self::regionCountry($regionData);
            self::regionGrapes($regionData);
            self::regionStatistics($regionData);
            self::region($regionData);
        })->count();

    }

    public static function regionCountry(RegionData $regionData): void
    {
        RegionCountry::updateOrCreate(
            ['region_id' => $regionData->id],
            ['country_code' => $regionData->country->code]
        );
    }

    public static function regionGrapes(RegionData $regionData): void
    {
        $regionData->grapes->each(function (GrapeData $grapeData) use ($regionData) {
            RegionGrape::updateOrCreate(
                [
                    'region_id' => $regionData->id,
                    'grape_id' => $grapeData->id
                ]
            );
        });
    }

    public static function regionStatistics(RegionData $regionData): void
    {
        RegionStatistics::updateOrCreate(
            ['region_id' => $regionData->id],
            [
                'wines_count' => $regionData?->statistics?->wines_count,
                'wineries_count' => $regionData?->statistics?->wineries_count,
                'sub_regions_count' => $regionData?->statistics?->sub_regions_count,
                'parent_regions_count' => $regionData?->statistics?->parent_regions_count,
            ]
        );

    }

    public static function region(RegionData $regionData): void
    {
        \App\Models\Vivino\Region::updateOrCreate(
            ['id' => $regionData->id],
            [
                'parent_id' => $regionData->parent_id,
                'name' => $regionData->name,
                'name_en' => $regionData->name_en,
                'seo_name' => $regionData->seo_name,
                'updated' => $regionData->updated,
            ]
        );

        if ($regionData->background_image)
            BackgroundImage::updateOrCreate([
                "parent_id" => $regionData->id,
                "model" => \App\Models\Vivino\Region::class
            ], ["location" => $regionData->background_image->location ? Images::save($regionData->background_image->location) : null]);

    }

}
