<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\WineData;
use App\Data\VivinoJson\WineryData;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\WineMaker;
use App\Models\Vivino\WineryFirstWine;
use App\Models\Vivino\WineryGroup;
use App\Models\Vivino\WineryLocation;
use App\Models\Vivino\WineryRegion;
use App\Models\Vivino\WineryStatistics;
use App\Models\Vivino\WineryWineMaker;
use App\Models\Vivino\WineryWineryGroup;

class Winery
{
    public static function handle(WineryData $wineryData): int
    {
        self::winery($wineryData);
        self::location($wineryData);
        self::region($wineryData);
        self::statistics($wineryData);
        self::wineMaker($wineryData);
        self::wineryGroup($wineryData);
        self::firstWines($wineryData);
        self::backgroundImage($wineryData);

        return 1;
    }

    public static function winery(WineryData $wineryData): void
    {
        \App\Models\Vivino\Winery::updateOrCreate(
            ['id' => $wineryData->id],
            [
                'name' => $wineryData->name,
                'seo_name' => $wineryData->seo_name,
                'business_name' => $wineryData->business_name,
                'description' => $wineryData->description,
                'email' => $wineryData->email,
                'facebook' => $wineryData->facebook,
                'instagram' => $wineryData->instagram,
                'twitter' => $wineryData->twitter,
                'website' => $wineryData->website,
                'phone' => $wineryData->phone,
                'is_claimed' => $wineryData->is_claimed,
                'review_status' => $wineryData->review_status,
                'specialists_notes' => $wineryData->specialists_notes,
                'sponsored_entity' => $wineryData->sponsored_entity,
                'sponsored_entity_type' => $wineryData->sponsored_entity_type,
                'status' => $wineryData->status,
                'winemaker' => $wineryData->winemaker,
            ]
        );
    }

    public static function location(WineryData $wineryData): void
    {
        if (isset($wineryData->location)) {
            WineryLocation::updateOrCreate(
                ['winery_id' => $wineryData->id],
                [
                    'latitude' => $wineryData->location->latitude,
                    'longitude' => $wineryData->location->longitude,
                ]
            );
        }
    }

    public static function region(WineryData $wineryData): void
    {
        if (isset($wineryData->region)) {
            WineryRegion::updateOrCreate(
                [
                    'winery_id' => $wineryData->id,
                    'region_id' => $wineryData->region->id,
                ]
            );
        }
    }

    public static function statistics(WineryData $wineryData): void
    {
        if (isset($wineryData->statistics)) {
            WineryStatistics::updateOrCreate(
                ['winery_id' => $wineryData->id],
                [
                    'labels_count' => $wineryData->statistics->labels_count,
                    'ratings_average' => $wineryData->statistics->ratings_average,
                    'ratings_count' => $wineryData->statistics->ratings_count,
                    'wines_count' => $wineryData->statistics->wines_count,
                ]
            );
        }
    }

    public static function wineMaker(WineryData $wineryData): void
    {
        if (isset($wineryData->wine_maker)) {
            WineMaker::updateOrCreate(
                [
                    'id' => $wineryData->wine_maker->id,
                    'name' => $wineryData->wine_maker->name,
                ]
            );

            WineryWineMaker::updateOrCreate(
                [
                    'winery_id' => $wineryData->id,
                    'wine_maker_id' => $wineryData->wine_maker->id,
                ]
            );

        }
    }

    public static function wineryGroup(WineryData $wineryData): void
    {
        if (isset($wineryData->winery_group)) {
            WineryGroup::updateOrCreate(
                ['id' => $wineryData->winery_group->id],
                [
                    'name' => $wineryData->winery_group->name,
                    'website' => $wineryData->winery_group->website,
                ]
            );

            WineryWineryGroup::updateOrCreate(
                [
                    'winery_id' => $wineryData->id,
                    'winery_group_id' => $wineryData->winery_group->id,
                ]
            );

        }
    }

    public static function firstWines(WineryData $wineryData): void
    {
        if (isset($wineryData->first_wines) && count($wineryData->first_wines) && $wineryId = $wineryData->id) {
            $wineryData->first_wines->each(function (WineData $wineData) use ($wineryId) {
                WineryFirstWine::updateOrCreate(
                    [
                        'winery_id' => $wineryId,
                        'wine_id' => $wineData->id,
                    ]
                );
            });
        }
    }

    public static function backgroundImage(WineryData $wineryData): void
    {
        if (isset($wineryData->background_image)) {
            BackgroundImage::updateOrCreate(
                [
                    "parent_id" => $wineryData->id,
                    "model" => \App\Models\Vivino\Winery::class
                ],
                [
                    "location" => $wineryData->background_image->location
                        ? Images::save($wineryData->background_image->location)
                        : null
                ]);
        }
    }

}
