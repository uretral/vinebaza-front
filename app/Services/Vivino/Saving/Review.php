<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\BackgroundImageData;
use App\Data\VivinoJson\ReviewData;
use App\Data\VivinoJson\ReviewFlavorWordMatchData;
use App\Data\VivinoJson\UserData;
use App\Data\VivinoJson\UserStatisticsData;
use App\Models\Vivino\BackgroundImage;
use App\Models\Vivino\ReviewFlavorWordMatch;
use App\Models\Vivino\User;
use App\Models\Vivino\UserStatistics;
use Spatie\LaravelData\DataCollection;

class Review
{

    public static function handle(DataCollection $dataCollection, int $wineId): int
    {
        dump($dataCollection->toArray());
        return $dataCollection->each(function (ReviewData $reviewData) use ($wineId) {

            \App\Models\Vivino\Review::updateOrCreate(
                ['id' => $reviewData->id],
                [
                    'user_id' => self::user($reviewData->user),
                    'wine_id' => $wineId,
                    'vintage_id' => $reviewData->vintage->id,
                    'rating' => $reviewData->rating,
                    'note' => $reviewData->note,
                    'language' => $reviewData->language,
                    'created' => $reviewData->created,
                    'aggregated' => $reviewData->aggregated,
                    'likes_count' => $reviewData->activity?->statistics?->likes_count,
                    'comments_count' => $reviewData->activity?->statistics?->comments_count,

                ]
            );

            if($reviewData->flavor_word_matches)
            self::reviewFlavorWordMatches($reviewData->flavor_word_matches, $reviewData->id);
            self::vintageImage($reviewData->vintage->image, $reviewData->id);

        })->count();

    }


    public static function user(UserData $userData): int
    {
        $user = User::updateOrCreate(['id' => $userData->id],
            [
                'alias' => $userData->alias,
                'is_featured' => $userData->is_featured,
                'is_premium' => $userData->is_premium,
                'language' => $userData->language,
                'seo_name' => $userData->seo_name,
                'visibility' => $userData->visibility,
            ]);
        self::userStatistics($userData->statistics, $user->id);
        if ($userData->image)
            self::userImage($userData->image, $user->id);

        return $user->id;

    }


    public static function userStatistics(UserStatisticsData $statisticsData, int $userId): void
    {
        UserStatistics::updateOrCreate(
            ['user_id' => $userId],
            [
                'followers_count' => $statisticsData->followers_count,
                'followings_count' => $statisticsData->followings_count,
                'ratings_count' => $statisticsData->ratings_count,
                'ratings_sum' => $statisticsData->ratings_sum,
                'reviews_count' => $statisticsData->reviews_count,
                'purchase_order_count' => $statisticsData->purchase_order_count,
            ]
        );

    }


    public static function reviewFlavorWordMatches(DataCollection $dataCollection, int $reviewId): void
    {
        $dataCollection->each(function (ReviewFlavorWordMatchData $matchData) use ($reviewId)  {
            if(isset($matchData->keyword_id))
            ReviewFlavorWordMatch::updateOrCreate(
                [
                    'review_id' => $reviewId,
                    'keyword_id' => $matchData->keyword_id,
                ]
            );
        });


    }


    public static function userImage(BackgroundImageData $imageData, $userId): void
    {
        if (isset($vintageData->image))
            BackgroundImage::updateOrCreate(
                ["parent_id" => $userId, "model" => User::class],
                ["location" => $imageData?->location ? Images::save($imageData->location) : null]
            );
    }

    public static function vintageImage(BackgroundImageData $imageData, int $reviewId): void
    {
        if (isset($vintageData->image))
            BackgroundImage::updateOrCreate(
                ["parent_id" => $reviewId, "model" => \App\Models\Vivino\Review::class],
                ["location" => $imageData?->location ? Images::save($imageData->location) : null]
            );
    }
}
