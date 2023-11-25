<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\BackgroundImageData;
use App\Data\VivinoJson\GrapeData;
use App\Data\VivinoJson\TopListData;
use App\Data\VivinoJson\TopListRankingsData;
use App\Data\VivinoJson\VintageAwardData;
use App\Data\VivinoJson\VintageData;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\TopList;
use App\Models\Vivino\TopListRanking;
use App\Models\Vivino\VintageAward;
use App\Models\Vivino\VintageGrape;
use App\Models\Vivino\VintageRanking;
use App\Models\Vivino\VintageStatistics;
use App\Models\Vivino\WineFact;
use App\Models\Vivino\WineVintage;
use Spatie\LaravelData\DataCollection;

class Vintage
{
    public static function handle(DataCollection $vintages, $wineId): int
    {
        dump($vintages[0]);

        return $vintages->each(function (VintageData $vintageData) use ($wineId) {
            self::awards($vintageData);
            self::grapes($vintageData);
            self::ranking($vintageData);
            self::statistics($vintageData);
            self::topListRankings($vintageData);
            self::wineFacts($vintageData);
            self::wineVintages($vintageData, $wineId);
            self::image($vintageData);
        })->count();
    }

    public static function awards(VintageData $vintageData): void
    {
        if ($vintageData->awards && count($vintageData->awards) && $vintageId = $vintageData->id)
            $vintageData->awards->each(function (VintageAwardData $awardData) use ($vintageId) {
                VintageAward::updateOrCreate(
                    ['id' => $awardData->id, 'vintage_id' => $vintageId],
                    [
                        'competition_id' => $awardData->competition_id,
                        'edition' => $awardData->edition,
                        'medal' => $awardData->medal,
                        'score' => $awardData->score,
                        'trophy' => $awardData->trophy,
                    ]
                );
            });
    }

    public static function grapes(VintageData $vintageData): void
    {
        if ($vintageData->grapes && count($vintageData->grapes) && $vintageId = $vintageData->id)
            $vintageData->grapes->each(function (GrapeData $grapeData) use ($vintageId) {
                VintageGrape::updateOrCreate(
                    ['vintage_id' => $vintageId, 'grape_id' => $grapeData->id]
                );
            });
    }

    public static function ranking(VintageData $vintageData): void
    {
        if ($vintageData->ranking)
            foreach ($vintageData->ranking as $key => $values) {
                VintageRanking::updateOrCreate(
                    ['vintage_id' => $vintageData->id, 'type' => $key],
                    [
                        'description' => $values->description ?? null,
                        'rank' => $values->rank ?? null,
                        'total' => $values->total ?? null,
                    ]
                );
            }
    }

    public static function statistics(VintageData $vintageData): void
    {
        if ($vintageData->statistics)
            VintageStatistics::updateOrCreate(
                ['vintage_id' => $vintageData->id],
                [
                    'labels_count' => $vintageData->statistics->labels_count,
                    'ratings_average' => $vintageData->statistics->ratings_average,
                    'ratings_count' => $vintageData->statistics->ratings_count,
                    'reviews_count' => $vintageData->statistics->reviews_count,
                    'wines_count' => $vintageData->statistics->wines_count,
                    'status' => $vintageData->statistics->status,
                ]
            );
    }

    public static function topListRankings(VintageData $vintageData): void
    {
        if ($vintageData->top_list_rankings && count($vintageData->top_list_rankings) && $vintageId = $vintageData->id)
            $vintageData->top_list_rankings->each(function (TopListRankingsData $topListRankingsData) use ($vintageId) {
                TopListRanking::updateOrCreate(
                    ['vintage_id' => $vintageId, 'top_list_id' => $topListRankingsData->top_list->id],
                    [
                        'description' => $topListRankingsData->description,
                        'previous_rank' => $topListRankingsData->previous_rank,
                        'rank' => $topListRankingsData->rank
                    ]
                );
                if ($topListRankingsData->top_list)
                    self::topList($topListRankingsData->top_list);
            });
    }

    public static function topList(TopListData $topListData): void
    {
        TopList::updateOrCreate(
            ['id' => $topListData->id],
            [
                'author' => $topListData->author,
                'country' => $topListData->country,
                'description' => $topListData->description,
                'icon' => $topListData->icon,
                'intro_header' => $topListData->intro_header,
                'level' => $topListData->level,
                'name' => $topListData->name,
                'seo_name' => $topListData->seo_name,
                'short_description' => $topListData->short_description,
                'state' => $topListData->state,
                'updated' => $topListData->updated,
            ]
        );

        if ($topListData->image && $topListData->id)
            self::topListImage($topListData->image, $topListData->id);
    }

    public static function topListImage(BackgroundImageData $imageData, int $topListDataId): void
    {
        if (isset($imageData->location))
            BackgroundImage::updateOrCreate(
                [
                    "parent_id" => $topListDataId,
                    "model" => \App\Models\Vivino\TopList::class
                ],
                ["location" => $imageData->location ? Images::save($imageData->location) : null]
            );
    }

    public static function wineFacts(VintageData $vintageData): void
    {
        if ($vintageData->wine_facts && !is_array($vintageData->wine_facts))
            foreach ((array)$vintageData->wine_facts as $parameter => $value) {
                WineFact::updateOrCreate(
                    ['vintage_id' => $vintageData->id, 'parameter' => $parameter],
                    ['value' => $value]
                );
            }
    }

    public static function wineVintages(VintageData $vintageData, int $wineId): void
    {
        \App\Models\Vivino\Vintage::updateOrCreate(
            ['id' => $vintageData->id],
            [
                'certified_biodynamic' => $vintageData->certified_biodynamic,
                'description' => $vintageData->description,
                'grape_composition' => $vintageData->grape_composition,
                'has_valid_ratings' => $vintageData->has_valid_ratings,
                'name' => $vintageData->name,
                'organic_certification_id' => $vintageData->organic_certification_id,
                'ratings_distribution' => $vintageData->ratings_distribution,
                'seo_name' => $vintageData->seo_name,
                'winemaker' => $vintageData->wine_maker,
                'year' => $vintageData->year,
            ]
        );

        WineVintage::updateOrCreate(
            ['vintage_id' => $vintageData->id, 'wine_id' => $wineId]
        );
    }

    public static function image(VintageData $vintageData): void
    {
        if (isset($vintageData->image))
            BackgroundImage::updateOrCreate(
                [
                    "parent_id" => $vintageData->id,
                    "model" => \App\Models\Vivino\Vintage::class
                ],
                [
                    "location" => $vintageData?->image?->location
                        ? Images::save($vintageData->image->location) : null,
                    "bottle" => $vintageData?->image?->variations->bottle_large
                        ? Images::save($vintageData->image->variations->bottle_large) : null,
                    "label" => $vintageData?->image?->variations->label
                        ? Images::save($vintageData->image->variations->label) : null,
                ]
            );
    }
}
