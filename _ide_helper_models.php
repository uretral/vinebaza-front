<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Catalog{
/**
 * App\Models\Catalog\Category
 *
 * @property int $id
 * @property string $slug
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models\Catalog{
/**
 * App\Models\Catalog\Product
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $name
 * @property string|null $translit
 * @property string|null $articul
 * @property string|null $code
 * @property string|null $picture
 * @property string|null $picture_small
 * @property int|null $category_id
 * @property int|null $type_id
 * @property int|null $color_id
 * @property int|null $sugar_id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $sub_region_id
 * @property int|null $manufacturer_id
 * @property int|null $stock_id
 * @property int|null $brand_id
 * @property string|null $grapes
 * @property string|null $pairings
 * @property string|null $tastes
 * @property string|null $grape_percentage
 * @property string|null $strength
 * @property string|null $volume
 * @property string|null $volume_type
 * @property string|null $notes_color
 * @property string|null $notes_taste
 * @property string|null $notes_aroma
 * @property string|null $notes_pairing
 * @property string|null $color_depth
 * @property string|null $richness
 * @property string|null $serving_temperature
 * @property string|null $storage_capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereArticul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereColorDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereGrapePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereGrapes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereManufacturerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereNotesAroma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereNotesColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereNotesPairing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereNotesTaste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product wherePairings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product wherePictureSmall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereRichness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereServingTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereStockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereStorageCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereSubRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereSugarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereTastes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereTranslit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereVolumeType($value)
 * @property int $status
 * @property string|null $facts
 * @property string|null $winestyle_link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereFacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Product whereWinestyleLink($value)
 * @property-read PropBrand|null $brand
 * @property-read PropColor|null $color
 * @property-read PropCountry|null $country
 * @property-read PropExpertsRating|null $ratingVivino
 * @property-read PropRegion|null $region
 * @property-read File|null $srcVivino
 * @property-read File|null $srcWinestyle
 * @property-read PropStock|null $stock
 * @property-read PropSubRegion|null $subRegion
 * @property-read PropType|null $sugar
 * @property-read \App\Models\Catalog\Vivino|null $vivino
 * @property-read PropManufacturers|null $winery
 * @method static \Illuminate\Database\Eloquent\Builder|Product priceBetween($prices)
 * @property array|null $grapes_sub
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGrapesSub($value)
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models\Catalog{
/**
 * App\Models\Catalog\Vivino
 *
 * @property int $id
 * @property int|null $product_id
 * @property int $product_code
 * @property int|null $vintage_id
 * @property int|null $wine_id
 * @property string|null $info
 * @property int|null $tastes
 * @property int|null $tastesReview
 * @property int|null $scoredReview
 * @property int|null $image
 * @property string|null $json_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereJsonPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereScoredReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereTastes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereTastesReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereVintageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereWineId($value)
 * @property string|null $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Catalog\Vivino whereName($value)
 * @property int $price
 * @property string|null $ratings_average
 * @property int|null $review_user_id
 * @property int|null $review_id
 * @property int|null $ratings_count
 * @property int|null $reviews_count
 * @property-read VivinoReview|null $itemReview
 * @property-read \App\Models\Catalog\Product|null $products
 * @property-read VivinoUser|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino priceBetween($arg)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereRatingsAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereRatingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereReviewUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereReviewsCount($value)
 * @property-read VivinoReview|null $review
 * @mixin \Eloquent
 * @property int|null $food
 * @property int|null $grapes
 * @property int|null $region
 * @property int|null $country
 * @property int|null $style
 * @property int|null $winery
 * @property int|null $vintages
 * @property int|null $flavor
 * @property int|null $structure
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereFlavor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereFood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereGrapes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereVintages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vivino whereWinery($value)
 */
	class Vivino extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ComputedCookie
 *
 * @property int $id
 * @property string $component
 * @property string $property
 * @property int|null $int
 * @property string|null $str
 * @property array|null $json
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereStr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ComputedCookie extends \Eloquent {}
}

namespace App\Models\Donors{
/**
 * App\Models\Donors\Donor
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Donor whereUrl($value)
 * @mixin \Eloquent
 */
	class Donor extends \Eloquent {}
}

namespace App\Models\Donors{
/**
 * App\Models\Donors\DonorLink
 *
 * @property int $id
 * @property int $donor_id
 * @property string $name
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereDonorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class DonorLink extends \Eloquent {}
}

namespace App\Models\Donors{
/**
 * App\Models\Donors\DonorProduct
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $category_id
 * @property int|null $donor_id
 * @property string|null $code
 * @property string|null $articul
 * @property int|null $stock
 * @property string|null $url
 * @property string|null $price
 * @property string|null $price_discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereArticul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereDonorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct wherePriceDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\DonorProduct whereUrl($value)
 * @mixin \Eloquent
 */
	class DonorProduct extends \Eloquent {}
}

namespace App\Models\Donors\Winestyle{
/**
 * App\Models\Donors\Winestyle\Review
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $rate
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Donors\Winestyle\Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Review extends \Eloquent {}
}

namespace App\Models\Menu{
/**
 * App\Models\Menu\MenuOrt
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MenuOrt extends \Eloquent {}
}

namespace App\Models\Menu{
/**
 * App\Models\Menu\MenuSub
 *
 * @property int $id
 * @property int $menu_top_id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Menu\MenuOrt[] $menuort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $menuort_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereMenuTopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereMenuort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MenuSub extends \Eloquent {}
}

namespace App\Models\Menu{
/**
 * App\Models\Menu\MenuTop
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu\MenuSub[] $submenu
 * @property-read int|null $submenu_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MenuTop extends \Eloquent {}
}

namespace App\Models\Parser{
/**
 * App\Models\Parser\ParserLog
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $node
 * @property string|null $code
 * @property string|null $message
 * @property int|null $ses_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereNode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereSesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereUrl($value)
 * @property string|null $entity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parser\ParserLog whereEntity($value)
 * @mixin \Eloquent
 */
	class ParserLog extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropBrand
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $site
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereUpdatedAt($value)
 * @property string|null $img
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $sub_region_id
 * @property string|null $url
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereSubRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropBrand whereUrl($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropBrand whereSlug($value)
 * @mixin \Eloquent
 */
	class PropBrand extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropColor
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereUrl($value)
 * @property string|null $img
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropColor whereText($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropColor whereSlug($value)
 * @mixin \Eloquent
 */
	class PropColor extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropCountries
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $flag
 * @property string|null $url
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereUrl($value)
 * @property string|null $img
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry wherePassed($value)
 * @property string|null $code
 * @property string|null $native_name
 * @property int|null $regions_count
 * @property string|null $seo_name
 * @property int|null $users_count
 * @property int|null $wineries_count
 * @property int|null $wines_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereRegionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereUsersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereWineriesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropCountry whereWinesCount($value)
 * @property int $sort
 * @method static \Illuminate\Database\Eloquent\Builder|PropCountry whereSort($value)
 * @property int|null $active
 * @property string|null $name_from_ru
 * @property string|null $name_from_en
 * @method static \Illuminate\Database\Eloquent\Builder|PropCountry whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropCountry whereNameFromEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropCountry whereNameFromRu($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropCountry whereSlug($value)
 * @mixin \Eloquent
 */
	class PropCountry extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropExpertsRating
 *
 * @property int $id
 * @property string $product_id
 * @property string|null $name
 * @property float|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropExpertsRating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PropExpertsRating extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropGrapes
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereUpdatedAt($value)
 * @property string|null $img
 * @property string|null $url
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereUrl($value)
 * @property int|null $has_detailed_info
 * @property int|null $vivino_id
 * @property string|null $seo_name
 * @property int|null $wines_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereHasDetailedInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereVivinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropGrape whereWinesCount($value)
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|PropGrape whereActive($value)
 * @mixin \Eloquent
 */
	class PropGrape extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropManufacturers
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $site
 * @property string|null $text_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereUpdatedAt($value)
 * @property string|null $img
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $sub_region_id
 * @property string|null $url
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereSubRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereTextProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereUrl($value)
 * @property int|null $vivino_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropManufacturers whereVivinoId($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropManufacturers whereSlug($value)
 * @mixin \Eloquent
 */
	class PropManufacturers extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropPairing
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereUpdatedAt($value)
 * @property string|null $title
 * @property string|null $ico
 * @property string|null $img
 * @property string|null $url
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereIco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropPairing whereUrl($value)
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|PropPairing whereActive($value)
 * @mixin \Eloquent
 */
	class PropPairing extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropRegion
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $country_id
 * @property string|null $url
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereUrl($value)
 * @property string|null $img
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion wherePassed($value)
 * @property int|null $vivino_id
 * @property string|null $native_name
 * @property string|null $seo_name
 * @property string|null $background
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropRegion whereVivinoId($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropRegion whereSlug($value)
 * @mixin \Eloquent
 */
	class PropRegion extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropStock
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropStock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PropStock extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropSubRegion
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property int $region_id
 * @property string|null $url
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereUrl($value)
 * @property string|null $img
 * @property int|null $country_id
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSubRegion wherePassed($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PropSubRegion whereSlug($value)
 * @mixin \Eloquent
 */
	class PropSubRegion extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropSugar
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropSugar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PropSugar extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropTaste
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereUpdatedAt($value)
 * @property string|null $title
 * @property string|null $ico
 * @property string|null $img
 * @property string|null $url
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereIco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropTaste whereUrl($value)
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|PropTaste whereActive($value)
 * @mixin \Eloquent
 */
	class PropTaste extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\PropType
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereUrl($value)
 * @property string|null $img
 * @property string|null $text
 * @property int|null $passed
 * @property int|null $log_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\PropType whereText($value)
 * @mixin \Eloquent
 */
	class PropType extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoCountry
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name_en
 * @property string|null $native_name
 * @property int|null $regions_count
 * @property string|null $seo_name
 * @property int|null $users_count
 * @property int|null $wineries_count
 * @property int|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereRegionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereUsersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereWineriesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoCountry whereWinesCount($value)
 * @mixin \Eloquent
 */
	class VivinoCountry extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoFlavorGroup
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFlavorGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class VivinoFlavorGroup extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoFood
 *
 * @property int $id
 * @property int|null $vivino_id
 * @property string|null $name_en
 * @property string|null $name_ru
 * @property string|null $seo_name
 * @property string|null $image
 * @property int|null $background
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoFood whereVivinoId($value)
 * @mixin \Eloquent
 */
	class VivinoFood extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoGrapes
 *
 * @property int $id
 * @property int|null $has_detailed_info
 * @property string|null $name_en
 * @property int|null $vivino_id
 * @property string|null $seo_name
 * @property int|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereHasDetailedInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereVivinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoGrapes whereWinesCount($value)
 * @mixin \Eloquent
 */
	class VivinoGrapes extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoHighlight
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoHighlight whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class VivinoHighlight extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoKeyword
 *
 * @property int $id
 * @property int|null $group_id
 * @property int|null $vivino_id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoKeyword whereVivinoId($value)
 * @mixin \Eloquent
 */
	class VivinoKeyword extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoRegion
 *
 * @property int $id
 * @property int $vivino_id
 * @property string $native_name
 * @property string $name_en
 * @property string $seo_name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $background
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoRegion whereVivinoId($value)
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|VivinoRegion whereSlug($value)
 * @mixin \Eloquent
 */
	class VivinoRegion extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoReview
 *
 * @property int $id
 * @property int|null $vivino_id
 * @property string|null $rating
 * @property string|null $note
 * @property string|null $tagged_note
 * @property string|null $language
 * @property int $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereTaggedNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereVivinoId($value)
 * @property int|null $vintage_id
 * @property int|null $wine_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereVintageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereWineId($value)
 * @property int|null $flavor_group
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereFlavorGroup($value)
 * @property string|null $note_ru
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoReview whereNoteRu($value)
 * @property-read \App\Models\Props\VivinoUser|null $userData
 * @mixin \Eloquent
 */
	class VivinoReview extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoStyle
 *
 * @property int $id
 * @property int|null $vivino_id
 * @property int|null $acidity
 * @property string|null $acidity_description
 * @property string|null $background
 * @property string|null $blurb
 * @property int|null $body
 * @property string|null $body_description
 * @property int|null $country
 * @property string|null $description
 * @property string|null $image
 * @property string|null $interesting_facts
 * @property int|null $name_en
 * @property int|null $name_ru
 * @property int|null $region
 * @property string|null $regional_name
 * @property string|null $seo_name
 * @property string|null $varietal_name
 * @property int|null $wine_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereAcidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereAcidityDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereBlurb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereBodyDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereInterestingFacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereRegionalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereVarietalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereVivinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoStyle whereWineTypeId($value)
 * @mixin \Eloquent
 */
	class VivinoStyle extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoToParse
 *
 * @property int $id
 * @property int|null $vintage_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoToParse whereVintageId($value)
 * @mixin \Eloquent
 */
	class VivinoToParse extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoUser
 *
 * @property int $id
 * @property int|null $vivino_id
 * @property string|null $seo_name
 * @property string|null $alias
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereVivinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoUser whereAvatar($value)
 * @property string|null $language
 * @method static \Illuminate\Database\Eloquent\Builder|VivinoUser whereLanguage($value)
 * @mixin \Eloquent
 */
	class VivinoUser extends \Eloquent {}
}

namespace App\Models\Props{
/**
 * App\Models\Props\VivinoWinery
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $background
 * @property string|null $background_sub
 * @property string|null $business_name
 * @property string|null $description
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $website
 * @property int|null $vivino_id
 * @property string|null $name_en
 * @property string|null $phone
 * @property string|null $seo_name
 * @property string|null $statistics
 * @property string|null $wine_maker
 * @property string|null $winemaker
 * @property string|null $winery_group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereBackgroundSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereStatistics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereVivinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereWineMaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Props\VivinoWinery whereWineryGroup($value)
 * @mixin \Eloquent
 */
	class VivinoWinery extends \Eloquent {}
}

namespace App\Models\Staff{
/**
 * App\Models\Staff\Stores
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string $name
 * @property string|null $logo
 * @property string|null $discount
 * @property string|null $offers_cnt
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stores newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereOffersCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores withoutTrashed()
 * @mixin \Eloquent
 */
	class Stores extends \Eloquent {}
}

namespace App\Models\System{
/**
 * App\Models\System\File
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $from
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\BackgroundImage
 *
 * @property int $id
 * @property int $parent_id
 * @property string $model
 * @property string|null $entity
 * @property string|null $location
 * @property string|null $bottle
 * @property string|null $label
 * @property string|null $small
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereBottle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereSmall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundImage whereUpdatedAt($value)
 */
	class BackgroundImage extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Country
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $native_name
 * @property int|null $regions_count
 * @property string|null $seo_name
 * @property int|null $users_count
 * @property int|null $wineries_count
 * @property int|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUsersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereWineriesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereWinesCount($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\CountryGrape
 *
 * @property int $id
 * @property string $country_code
 * @property int $grape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryGrape whereUpdatedAt($value)
 */
	class CountryGrape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Currency
 *
 * @property int $id
 * @property string|null $country_code
 * @property string|null $code
 * @property string|null $name
 * @property string|null $prefix
 * @property string|null $suffix
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Flavor
 *
 * @property int $id
 * @property int $wine_id
 * @property int $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flavor whereWineId($value)
 */
	class Flavor extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\FlavorKeyword
 *
 * @property int $id
 * @property int $flavor_id
 * @property int $keyword_id
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereFlavorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereKeywordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorKeyword whereUpdatedAt($value)
 */
	class FlavorKeyword extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\FlavorStat
 *
 * @property int $id
 * @property int $flavor_id
 * @property int|null $count
 * @property int|null $mentions_count
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereFlavorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereMentionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlavorStat whereUpdatedAt($value)
 */
	class FlavorStat extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Food
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $seo_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vivino\BackgroundImage> $background_image
 * @property-read int|null $background_image_count
 * @method static \Illuminate\Database\Eloquent\Builder|Food newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Food newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Food query()
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereUpdatedAt($value)
 */
	class Food extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Grape
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $seo_name
 * @property string|null $description
 * @property int|null $has_detailed_info
 * @property int|null $parent_grape_id
 * @property array|null $originating_grapes
 * @property string|null $flavor_profile
 * @property int|null $color
 * @property int|null $acidity
 * @property int|null $body
 * @property int|null $wines_count
 * @property string|null $acidity_description
 * @property string|null $body_description
 * @property int|null $main_region_id
 * @property string|null $country_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Grape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grape query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereAcidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereAcidityDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereBodyDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereFlavorProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereHasDetailedInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereMainRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereOriginatingGrapes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereParentGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grape whereWinesCount($value)
 */
	class Grape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\GrapeAlias
 *
 * @property int $id
 * @property int|null $parent_grape_id
 * @property string|null $name
 * @property string|null $seo_name
 * @property int|null $has_detailed_info
 * @property int|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereHasDetailedInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereParentGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeAlias whereWinesCount($value)
 */
	class GrapeAlias extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\GrapeTopCountriesOfUse
 *
 * @property int $id
 * @property int $grape_id
 * @property string $entity
 * @property int|null $percent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse whereEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopCountriesOfUse whereUpdatedAt($value)
 */
	class GrapeTopCountriesOfUse extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\GrapeTopType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopType whereUpdatedAt($value)
 */
	class GrapeTopType extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\GrapeTopTypePercentage
 *
 * @property int $id
 * @property int $grape_id
 * @property int $top_type_id
 * @property int|null $percent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage whereTopTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrapeTopTypePercentage whereUpdatedAt($value)
 */
	class GrapeTopTypePercentage extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Group
 *
 * @property int $id
 * @property string $group
 * @property string|null $fill
 * @property string|null $path_fill
 * @property string|null $path_d
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereFill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePathD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePathFill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Keyword
 *
 * @property int $id
 * @property string $name
 * @property int|null $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereUpdatedAt($value)
 */
	class Keyword extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Region
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $name
 * @property string|null $name_en
 * @property string|null $seo_name
 * @property string|null $updated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\RegionCountry
 *
 * @property int $id
 * @property int|null $region_id
 * @property string|null $country_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionCountry whereUpdatedAt($value)
 */
	class RegionCountry extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\RegionGrape
 *
 * @property int $id
 * @property int $region_id
 * @property int $grape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionGrape whereUpdatedAt($value)
 */
	class RegionGrape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\RegionStatistics
 *
 * @property int $id
 * @property int|null $region_id
 * @property int|null $wines_count
 * @property int|null $wineries_count
 * @property int|null $sub_regions_count
 * @property int|null $parent_regions_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereParentRegionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereSubRegionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereWineriesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegionStatistics whereWinesCount($value)
 */
	class RegionStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Review
 *
 * @property int $id
 * @property string|null $user_id
 * @property int|null $wine_id
 * @property int|null $vintage_id
 * @property float|null $rating
 * @property string|null $note
 * @property string|null $language
 * @property string|null $created
 * @property int|null $aggregated
 * @property int|null $likes_count
 * @property int|null $comments_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAggregated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCommentsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereLikesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereVintageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereWineId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\ReviewFlavorWordMatch
 *
 * @property int $id
 * @property int $review_id
 * @property int $keyword_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch whereKeywordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewFlavorWordMatch whereUpdatedAt($value)
 */
	class ReviewFlavorWordMatch extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Structure
 *
 * @property int $id
 * @property int $wine_id
 * @property int|null $acidity
 * @property int|null $fizziness
 * @property int|null $intensity
 * @property int|null $sweetness
 * @property int|null $tannin
 * @property int|null $calculated_structure_count
 * @property int|null $user_structure_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Structure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereAcidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereCalculatedStructureCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereFizziness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereIntensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereSweetness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereTannin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereUserStructureCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereWineId($value)
 */
	class Structure extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Style
 *
 * @property int $id
 * @property int|null $acidity
 * @property string|null $acidity_description
 * @property int|null $blurb
 * @property int|null $body
 * @property string|null $body_description
 * @property string|null $description
 * @property int|null $hidden
 * @property string|null $name
 * @property string|null $interesting_facts
 * @property int|null $parent_style_id
 * @property string|null $regional_name
 * @property string|null $seo_name
 * @property string|null $varietal_name
 * @property string|null $vintage_mask
 * @property string|null $wine_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Style newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Style newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Style query()
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereAcidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereAcidityDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereBlurb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereBodyDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereInterestingFacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereParentStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereRegionalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereVarietalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereVintageMask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Style whereWineTypeId($value)
 */
	class Style extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleBaselineStructure
 *
 * @property int $id
 * @property int|null $style_id
 * @property float|null $acidity
 * @property float|null $fizziness
 * @property float|null $intensity
 * @property float|null $sweetness
 * @property float|null $tannin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereAcidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereFizziness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereIntensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereSweetness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereTannin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleBaselineStructure whereUpdatedAt($value)
 */
	class StyleBaselineStructure extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleCountry
 *
 * @property int $id
 * @property int $style_id
 * @property string $country_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleCountry whereUpdatedAt($value)
 */
	class StyleCountry extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleFood
 *
 * @property int $id
 * @property int $style_id
 * @property int $food_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood whereFoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleFood whereUpdatedAt($value)
 */
	class StyleFood extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleGrape
 *
 * @property int $id
 * @property int $style_id
 * @property int $grape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleGrape whereUpdatedAt($value)
 */
	class StyleGrape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleRegion
 *
 * @property int $id
 * @property int $style_id
 * @property int $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleRegion whereUpdatedAt($value)
 */
	class StyleRegion extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\StyleStatistics
 *
 * @property int $id
 * @property int $style_id
 * @property int|null $aggregated_wines_count
 * @property int|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereAggregatedWinesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StyleStatistics whereWinesCount($value)
 */
	class StyleStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\TopList
 *
 * @property int $id
 * @property string|null $author
 * @property string|null $country
 * @property string|null $description
 * @property string|null $icon
 * @property string|null $intro_header
 * @property int|null $level
 * @property string|null $name
 * @property string|null $seo_name
 * @property string|null $short_description
 * @property string|null $state
 * @property string|null $updated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TopList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereIntroHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopList whereUpdatedAt($value)
 */
	class TopList extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\TopListRanking
 *
 * @property int $id
 * @property int $vintage_id
 * @property int $top_list_id
 * @property string|null $description
 * @property int|null $previous_rank
 * @property int|null $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking wherePreviousRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereTopListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopListRanking whereVintageId($value)
 */
	class TopListRanking extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\User
 *
 * @property int $id
 * @property string|null $alias
 * @property int|null $is_featured
 * @property int|null $is_premium
 * @property string|null $language
 * @property string|null $seo_name
 * @property string|null $visibility
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsPremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVisibility($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\UserStatistics
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $followers_count
 * @property int|null $followings_count
 * @property int|null $ratings_count
 * @property int|null $ratings_sum
 * @property int|null $reviews_count
 * @property int|null $purchase_order_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereFollowersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereFollowingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics wherePurchaseOrderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereRatingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereRatingsSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereReviewsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatistics whereUserId($value)
 */
	class UserStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Vintage
 *
 * @property int $id
 * @property string|null $certified_biodynamic
 * @property string|null $description
 * @property array|null $grape_composition
 * @property int|null $has_valid_ratings
 * @property string|null $name
 * @property string|null $organic_certification_id
 * @property array|null $ratings_distribution
 * @property string|null $seo_name
 * @property string|null $winemaker
 * @property string|null $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereCertifiedBiodynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereGrapeComposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereHasValidRatings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereOrganicCertificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereRatingsDistribution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereWinemaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vintage whereYear($value)
 */
	class Vintage extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\VintageAward
 *
 * @property int $id
 * @property int|null $competition_id
 * @property int|null $edition
 * @property string|null $medal
 * @property string|null $score
 * @property string|null $trophy
 * @property int $vintage_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward query()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereCompetitionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereEdition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereMedal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereTrophy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageAward whereVintageId($value)
 */
	class VintageAward extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\VintageGrape
 *
 * @property int $id
 * @property int $vintage_id
 * @property int $grape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageGrape whereVintageId($value)
 */
	class VintageGrape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\VintageRanking
 *
 * @property int $id
 * @property int $vintage_id
 * @property string $type
 * @property string|null $description
 * @property int|null $rank
 * @property int|null $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking query()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageRanking whereVintageId($value)
 */
	class VintageRanking extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\VintageStatistics
 *
 * @property int $id
 * @property int $vintage_id
 * @property float|null $labels_count
 * @property float|null $ratings_average
 * @property float|null $ratings_count
 * @property float|null $reviews_count
 * @property float|null $vintages_count
 * @property float|null $wines_count
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereLabelsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereRatingsAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereRatingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereReviewsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereVintageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereVintagesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VintageStatistics whereWinesCount($value)
 */
	class VintageStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Wine
 *
 * @property int $id
 * @property float|null $alcohol
 * @property string|null $closure
 * @property string|null $description
 * @property int|null $has_valid_ratings
 * @property int|null $hidden
 * @property int|null $is_first_wine
 * @property int|null $is_natural
 * @property string|null $name
 * @property int|null $non_vintage
 * @property int|null $review_status
 * @property string|null $seo_name
 * @property int|null $sweetness_id
 * @property int|null $type_id
 * @property string|null $vintage_mask_raw
 * @property int|null $vintage_type
 * @property string|null $created
 * @property string|null $updated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vivino\Food> $foods
 * @property-read int|null $foods_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vivino\Grape> $grapes
 * @property-read int|null $grapes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Wine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereAlcohol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereClosure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereHasValidRatings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereIsFirstWine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereIsNatural($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereNonVintage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereReviewStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereSweetnessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereVintageMaskRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wine whereVintageType($value)
 */
	class Wine extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineFact
 *
 * @property int $id
 * @property int $vintage_id
 * @property string $parameter
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFact whereVintageId($value)
 */
	class WineFact extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineFood
 *
 * @property int $id
 * @property int $wine_id
 * @property int $food_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood whereFoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineFood whereWineId($value)
 */
	class WineFood extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineGrape
 *
 * @property int $id
 * @property int $wine_id
 * @property int $grape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape whereGrapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineGrape whereWineId($value)
 */
	class WineGrape extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineMaker
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineMaker whereUpdatedAt($value)
 */
	class WineMaker extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineRegion
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WineRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineRegion query()
 */
	class WineRegion extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineStatistics
 *
 * @property int $id
 * @property int $wine_id
 * @property int|null $labels_count
 * @property float|null $ratings_average
 * @property int|null $ratings_count
 * @property string|null $status
 * @property int|null $vintages_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereLabelsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereRatingsAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereRatingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereVintagesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStatistics whereWineId($value)
 */
	class WineStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineStyle
 *
 * @property int $id
 * @property int $wine_id
 * @property int $style_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle whereStyleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineStyle whereWineId($value)
 */
	class WineStyle extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineVintage
 *
 * @property int $id
 * @property int $vintage_id
 * @property int $wine_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage whereVintageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineVintage whereWineId($value)
 */
	class WineVintage extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\Winery
 *
 * @property int $id
 * @property string|null $business_name
 * @property string|null $description
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $instagram
 * @property int|null $is_claimed
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $review_status
 * @property string|null $seo_name
 * @property string|null $specialists_notes
 * @property string|null $sponsored_entity
 * @property int|null $sponsored_entity_type
 * @property int|null $status
 * @property string|null $twitter
 * @property string|null $website
 * @property string|null $winemaker
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Winery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereIsClaimed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereReviewStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereSeoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereSpecialistsNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereSponsoredEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereSponsoredEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winery whereWinemaker($value)
 */
	class Winery extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryFirstWine
 *
 * @property int $id
 * @property int $winery_id
 * @property int $wine_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine whereWineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryFirstWine whereWineryId($value)
 */
	class WineryFirstWine extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryGroup
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryGroup whereWebsite($value)
 */
	class WineryGroup extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryLocation
 *
 * @property int $id
 * @property int $winery_id
 * @property string $latitude
 * @property string $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryLocation whereWineryId($value)
 */
	class WineryLocation extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryRegion
 *
 * @property int $id
 * @property int $winery_id
 * @property int $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryRegion whereWineryId($value)
 */
	class WineryRegion extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryStatistics
 *
 * @property int $id
 * @property int $winery_id
 * @property float|null $labels_count
 * @property float|null $ratings_average
 * @property float|null $ratings_count
 * @property float|null $wines_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereLabelsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereRatingsAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereRatingsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereWineryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryStatistics whereWinesCount($value)
 */
	class WineryStatistics extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryWineMaker
 *
 * @property int $id
 * @property int $winery_id
 * @property int $wine_maker_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker whereWineMakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineMaker whereWineryId($value)
 */
	class WineryWineMaker extends \Eloquent {}
}

namespace App\Models\Vivino{
/**
 * App\Models\Vivino\WineryWineryGroup
 *
 * @property int $id
 * @property int $winery_id
 * @property int $winery_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup whereWineryGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WineryWineryGroup whereWineryId($value)
 */
	class WineryWineryGroup extends \Eloquent {}
}

