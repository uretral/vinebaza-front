<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\FlavorData;
use App\Data\VivinoJson\KeywordsData;
use App\Data\VivinoJson\StatsData;
use App\Models\Vivino\FlavorKeyword;
use App\Models\Vivino\FlavorStat;
use App\Models\Vivino\Group;
use App\Models\Vivino\Keyword;
use Spatie\LaravelData\DataCollection;

class Flavor
{
    public static function handle(DataCollection $flavorCollection, int $wineId): int
    {
        return $flavorCollection->each(function (FlavorData $flavorData) use ($wineId) {

            $group = self::group($flavorData->group);

            $flavor = \App\Models\Vivino\Flavor::updateOrCreate(
                [
                    'wine_id' => $wineId,
                    'group_id' => $group->id
                ]
            );

            self::primaryKeywords($flavorData, $flavor->id, $group);
            self::stats($flavorData->stats, $flavor->id);
        })->count();

    }

    public static function group($group): Group
    {
        return Group::updateOrCreate(
            ['group' => $group]
        );
    }

    public static function keyword(KeywordsData $keywordsData, Group $group): int
    {
        return Keyword::updateOrCreate(
            [
                'id' => $keywordsData->id,
                'name' => $keywordsData->name,
            ],
            ['group_id' => $group->id]
        )->getAttribute('id');
    }


    public static function primaryKeywords(FlavorData $flavorData, int $flavorId, Group $group): void
    {
        $flavorData->primary_keywords?->each(function (KeywordsData $keywordsData) use ($flavorId, $group) {
            FlavorKeyword::updateOrCreate(
                [
                    'flavor_id' => $flavorId,
                    'keyword_id' => self::keyword($keywordsData, $group),
                    'type' => 'primary'
                ]
            );
        });

        $flavorData->secondary_keywords?->each(function (KeywordsData $keywordsData) use ($flavorId, $group) {
            FlavorKeyword::updateOrCreate(
                [
                    'flavor_id' => $flavorId,
                    'keyword_id' => self::keyword($keywordsData, $group),
                    'type' => 'secondary'
                ]
            );
        });
    }


    public static function stats(StatsData $statsData, int $flavorId): void
    {
        FlavorStat::updateOrCreate(
            ['flavor_id' => $flavorId], $statsData->toArray()
        );

    }

}
