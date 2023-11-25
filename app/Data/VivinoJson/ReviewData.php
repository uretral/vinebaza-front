<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ReviewData extends Data
{
    public function __construct(
        public ?int $id,
        public ?float $rating,
        public ?string $note,
        public ?string $language,
        #[MapInputName('created_at')]
        public ?string $created,
        #[DataCollectionOf(ReviewFlavorWordMatchData::class)]
        public ?DataCollection $flavor_word_matches,
        public ?bool $aggregated,
        public ?UserData $user,
        public ?VintageData $vintage,
        public ?ReviewActivityData $activity,
        public ?int $likes_count,
        public ?int $comments_count
    )
    {
    }
}
