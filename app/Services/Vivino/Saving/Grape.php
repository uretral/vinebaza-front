<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\GrapeAliasData;
use App\Data\VivinoJson\GrapeData;
use App\Data\VivinoJson\GrapeTopCountriesOfUseData;
use App\Data\VivinoJson\GrapeTopTypeData;
use App\Models\Vivino\GrapeAlias;
use App\Models\Vivino\GrapeTopCountriesOfUse;
use App\Models\Vivino\GrapeTopType;
use App\Models\Vivino\GrapeTopTypePercentage;
use App\Models\Vivino\WineGrape;
use Spatie\LaravelData\DataCollection;

class Grape
{

    public static function handle(
        DataCollection $grapes,
        int $wine_id,
        DataCollection $wineGrapes): int
    {
        $wineGrapes->each(function (GrapeData $grapeData) use ($wine_id) {
            WineGrape::updateOrCreate(
                ['wine_id' => $wine_id, 'grape_id' => $grapeData->id]
            );
        });

        return $grapes->each(function (GrapeData $grapeData) use ($wine_id) {
            self::grapeAliases($grapeData->aliases);
            self::topTypes($grapeData->top_types, $grapeData->id);
            self::topCountriesOfUse($grapeData->top_countries_of_use,$grapeData->id);
            self::grape($grapeData, $wine_id);
        })->count();
    }


    public static function grape(GrapeData $grapeData, $wine_id): void
    {
        \App\Models\Vivino\Grape::updateOrCreate(
            ['id' => $grapeData->id],
            $grapeData->except('aliases', 'main_region', 'top_types', 'top_countries_of_use')->toArray()
        );
    }

    public static function grapeAliases(DataCollection $aliasDataCollection): void
    {
        $aliasDataCollection->each(function (GrapeAliasData $aliasData) {
            GrapeAlias::updateOrCreate(['id' => $aliasData->id], $aliasData->toArray());
        });
    }

    public static function topTypes(DataCollection $collection, int $grapeId): void
    {
        $collection->each(function (GrapeTopTypeData $topTypeData) use ($grapeId) {

            GrapeTopType::updateOrCreate(['id' => $topTypeData->id], ['name' => $topTypeData->name]);

            GrapeTopTypePercentage::updateOrCreate(
                ['grape_id' => $grapeId, 'top_type_id' => $topTypeData->id],
                ['percent' => $topTypeData->percent]
            );
        });

    }

    public static function topCountriesOfUse(DataCollection $collection, $grapeId): void
    {

        $collection->each(function (GrapeTopCountriesOfUseData $data) use ($grapeId){
            GrapeTopCountriesOfUse::updateOrCreate(
                ['grape_id' => $grapeId, 'entity' => $data->entity],
                ['percent' => $data->percent]
            );
        });
    }
}
