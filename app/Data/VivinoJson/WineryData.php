<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class WineryData extends Data
{
    public function __construct(
        public ?AddressData         $address,
        public ?BackgroundImageData $background_image,
        public ?string              $business_name,
        public ?string              $description,
        public ?string              $email,
        public ?string              $facebook,
        #[DataCollectionOf(WineData::class)]
        public ?DataCollection      $first_wines,
        public ?int                 $id,
        public ?ImageData           $image,
        public ?string              $instagram,
        public ?bool                $is_claimed,
        public ?LocationData        $location,
        public ?string              $name,
        public ?string              $phone,
        public ?RegionData          $region,
        public ?string              $review_status,
        public ?string              $seo_name,
        public ?string              $specialists_notes,
        public ?string              $sponsored_entity,
        public ?int                 $sponsored_entity_type,
        public ?StatisticsWineData  $statistics,
        public ?int                 $status,
        public ?string              $twitter,
        public ?string              $website,
        public ?WineMakerData       $wine_maker,
        public ?string              $winemaker,
        public ?WineryGroupData     $winery_group,


    )
    {
    }
}
