<?php


namespace App\Services\Vivino;


use App\Http\Controllers\Controller;
use App\Models\Catalog\Vivino;
use App\Models\Props\PropCountry;
use App\Models\Props\PropGrape;
use App\Models\Props\PropManufacturers;
use App\Models\Props\PropRegion;
use App\Models\Props\VivinoCountry;
use App\Models\Props\VivinoFlavorGroup;
use App\Models\Props\VivinoFood;
use App\Models\Props\VivinoGrapes;
use App\Models\Props\VivinoHighlight;
use App\Models\Props\VivinoKeyword;
use App\Models\Props\VivinoRegion;
use App\Models\Props\VivinoReview;
use App\Models\Props\VivinoStyle;
use App\Models\Props\VivinoToParse;
use App\Models\Props\VivinoUser;
use App\Models\Props\VivinoWinery;
use Illuminate\Database\QueryException;
use Intervention\Image\ImageManager;

class PropController extends Controller
{
//    public $info;
//    public $highlights = [];
//    public $recommended_vintages = [];
//    public $scoredReview = [];
//    public $flavorGroups = [];
//    public $keywords = [];

    public $result = [];


    public function __construct($vintage, $wine, $case)
    {
        $file = storage_path('app/public/vivino/json/' . $vintage . '_' . $wine . '.json');
        $json = json_decode(file_get_contents($file));
//        $this->tastes = $json->tastes;
//        $this->tastesReview = $json->tastesReview;
//        $this->scoredReview = $json->scoredReview;

        switch ($case) {
            case 'highlights':
                $this->highlights($json->info);
                break;
            case 'recommended':
                if (isset($json->info->recommended_vintages)) {
                    foreach ($json->info->recommended_vintages as $item) {
                        $this->toParse($item->vintage->id);
                    }
                }
                if (isset($json->info->vintage->wine->vintages)) {
                    foreach ($json->info->vintage->wine->vintages as $item) {
                        $this->toParse($item->id);
                    }
                }
                if (isset($json->info->wine->vintages)) {
                    foreach ($json->info->wine->vintages as $item) {
                        $this->toParse($item->id);
                    }
                }
                break;
            case 'reviews':
                $this->reviews($json->scoredReview);
                break;
            case 'tastes':
                $this->tastes($json->tastes, $json->tastesReview);
                break;

            case 'others':
                //foods
                $this->result = [
                    'foods'   => [],
                    'grapes'  => [],
                    'country' => [],
                    'region'  => [],
                    'winery'  => [],
                    'style'   => [],
                ];

                if (isset($json->info->vintage->wine->foods) && $json->info->vintage->wine->foods) {
                    foreach ($json->info->vintage->wine->foods as $item) {
                        $this->result['foods'][] = $this->createFood($item);
                    }

                }
                //grapes
                if (isset($json->info->vintage->wine->grapes) && $json->info->vintage->wine->grapes) {
                    foreach ($json->info->vintage->wine->grapes as $item) {
                        $this->result['grapes'][] = $this->createGrape($item);
                    }
                }
                if (isset($json->info->vintage->wine->region->country->most_used_grapes) && $json->info->vintage->wine->region->country->most_used_grapes) {
                    foreach ($json->info->vintage->wine->region->country->most_used_grapes as $item) {
                        $this->result['grapes'][] = $this->createGrape($item);
                    }
                }
                // country
                if (isset($json->info->vintage->wine->region->country) && $json->info->vintage->wine->region->country) {
                    $this->result['country'][] = $this->createCountry($json->info->vintage->wine->region->country);
                }
                // region
                if (isset($json->info->vintage->wine->region) && $json->info->vintage->wine->region) {
                    $this->result['region'][] = $this->createRegion($json->info->vintage->wine->region);
                }
                // winery
                if (isset($json->info->vintage->wine->winery) && $json->info->vintage->wine->winery) {
                    $this->result['winery'][] = $this->createWinery($json->info->vintage->wine->winery);
                }
                // style
                if (isset($json->info->vintage->wine->style) && $json->info->vintage->wine->style) {
                    $this->result['style'][] = $this->createStyle($json->info->vintage->wine->style);
                }
                break;


            /*            case 'foods':
                            if (isset($json->info->vintage->wine->foods)) {
                                foreach ($json->info->vintage->wine->foods as $item) {
                                    $this->result[] = $this->createFood($item);
                                }
                            }
                            break;
                        case 'grapes':
                            if (isset($json->info->vintage->wine->grapes)) {
                                foreach ($json->info->vintage->wine->grapes as $item) {
                                    $this->result[] = $this->createGrape($item);
                                }
                            }
                            if (isset($json->info->vintage->wine->region->country->most_used_grapes)) {
                                foreach ($json->info->vintage->wine->region->country->most_used_grapes as $item) {
                                    $this->result[] = $this->createGrape($item);
                                }
                            }
                            break;
                        case 'country':
                            if (isset($json->info->vintage->wine->region->country)) {
                                $this->result[] = $this->createCountry($json->info->vintage->wine->region->country);
                            }
                            break;
                        case 'region':
                            if (isset($json->info->vintage->wine->region)) {
                                    $this->result[] = $this->createRegion($json->info->vintage->wine->region);
                            }
                            break;
                        case 'winery':
                            if (isset($json->info->vintage->wine->winery)) {
                                $this->result[] = $this->createWinery($json->info->vintage->wine->winery);
                            }
                            break;
                        case 'style':
                            if (isset($json->info->vintage->wine->style)) {
            //                    dump($json->info->vintage->wine->style);
                                $this->result[] = $this->createStyle($json->info->vintage->wine->style);
                            }
                            break;*/
        }


//        $this->highlights($json->info);
//        $this->recommendedVintages($json->info);
//        $this->reviews($json->scoredReview);
//        $this->tastes($json->tastes,$json->tastesReview);


    }

// highlights
    public function highlights($data)
    {
        if (!isset($data->highlights)) {
            return false;
        }
        foreach ($data->highlights as $item) {
            if (isset($item->highlight_type)) {
                try {
                    $icon = isset($item->icon) ? $item->icon : null;
                    $this->result[] = VivinoHighlight::create([
                        'type' => $item->highlight_type,
                        'icon' => $this->fileSave($icon, 'highlights', $item->highlight_type),
                    ])->id;
                } catch (QueryException $e) {
                    $this->result[] = false;
                }
            }
        }
    }

// recommendedVintages
    public function toParse($vintageID)
    {
        try {
            return $this->result[] = VivinoToParse::create(['vintage_id' => $vintageID])->vintage_id;
        } catch (QueryException $e) {
            return $this->result[] = false;
        }
    }

    public function reviews($data)
    {
        if (!$data) {
            return false;
        }

        foreach ($data as $reviews) {
            foreach ($reviews->reviews as $item) {
                $this->result[] = $this->makeReview($item);

            }
        }

    }


    public function tastes($tastes, $reviews)
    {
        if (isset($tastes->tastes->flavor)) {
            $this->result = [
                'group'    => [],
                'keywords' => [],
                'reviews'  => [],
            ];
            $arGroup = [];
            $arKeywords = [];
            $arReviews = [];
            foreach ($tastes->tastes->flavor as $flavorKey => $flavorGroup) {
                try {
                    $this->result['group'][] = $this->flavorGroup($flavorGroup->group);
                } catch (QueryException $e) {
                    $this->result['group'][] = false;
                }

                $keyWords = isset($flavorGroup->primary_keywords) ? $flavorGroup->primary_keywords : $flavorGroup->secondary_keywords;

                foreach ($keyWords as $keyword) {
                    try {
                        $this->result['keywords'][] = $this->keywords($keyword, $flavorGroup->group);
                    } catch (QueryException $e) {
                        $this->result['keywords'][] = false;
                    }
                }
                foreach ($reviews[$flavorKey]->reviews as $item) {
                    $this->result['reviews'][] = $this->makeReview($item);
                }
            }
        }

    }


    public function flavorGroup($name)
    {
        try {
            return VivinoFlavorGroup::create([
                'name_en' => $name,
            ])->name_en;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function keywords($item, $group)
    {
        try {
            return VivinoKeyword::create([
                'group_id'  => $group,
                'vivino_id' => $item->id,
                'name_en'   => $item->name,
            ])->name_en;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function makeReview($item, $flavorGroup = null)
    {
        try {
            return VivinoReview::create([
                'vivino_id'    => $item->id,
                'vintage_id'   => isset($item->vintage->id) ? $item->vintage->id : null,
                'wine_id'      => isset($item->vintage->wine->id) ? $item->vintage->wine->id : null,
                'rating'       => $item->rating,
                'note'         => $item->note,
                'tagged_note'  => $item->tagged_note,
                'language'     => $item->language,
                'user'         => $this->makeUser($item->user),
                'flavor_group' => $flavorGroup,
            ])->vivino_id;
        } catch (QueryException $e) {
            return false;
        }
    }


    public function createFood($item)
    {

        if (isset($item->background_image->location) && $item->background_image->location) {
            $background = $this->fileSave('http:' . $item->background_image->location, 'foods_background', $item->id);
        } else {
            $background = null;
        }
        try {
            return VivinoFood::create([
                'vivino_id'  => $item->id,
                'name_en'    => isset($item->name) ? $item->name : null,
                'seo_name'   => isset($item->seo_name) ? $item->seo_name : null,
                'background' => $background
            ])->vivino_id;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function createGrape($item)
    {

        $old = PropGrape::where('url', 'like', '%/' . $item->seo_name . '/%')->first();
        $arr = [
            'has_detailed_info' => $item->has_detailed_info ? 1 : 0,
            'name_en'           => $item->name,
            'vivino_id'         => $item->id,
            'seo_name'          => $item->seo_name,
            'wines_count'       => $item->wines_count,
        ];
        if ($old) {
            if (is_null($old->name_en)) {
                return PropGrape::where('url', 'like', '%/' . $item->seo_name . '/%')->update($arr);
            } else {
                return false;
            }
        } else {
            try {
                return VivinoGrapes::create($arr)->vivino_id;
            } catch (QueryException $e) {
                return false;
            }

        }

    }

    public function createCountry($item)
    {

        $old = PropCountry::where('url', 'like', '%/' . $item->seo_name . '/%')->first();
        $arr = [
            'code'           => $item->code,
            'name_en'        => $item->name,
            'native_name'    => $item->native_name,
            'regions_count'  => $item->regions_count,
            'seo_name'       => $item->seo_name,
            'users_count'    => $item->users_count,
            'wineries_count' => $item->wineries_count,
            'wines_count'    => $item->wines_count
        ];
        if ($old) {
            if (is_null($old->name_en)) {
                return PropCountry::where('url', 'like', '%/' . $item->seo_name . '/%')->update($arr);
            } else {
                return false;
            }
        } else {
            try {
                return VivinoCountry::create($arr)->name_en;
            } catch (QueryException $e) {
                return false;
            }
        }

    }

    public function createRegion($item)
    {


        if (isset($item->background_image->location) && $item->background_image->location) {
            $background = $item->background_image->location;
        } else {
            $background = null;
        }

        $arr = [
            'vivino_id'   => $item->id,
            'native_name' => $item->name,
            'name_en'     => $item->name_en,
            'seo_name'    => $item->seo_name,
            'background'  => $this->fileSave('http:' . $background, 'region', $item->id),
        ];
        $old = PropRegion::where('url', 'like', '%/' . $item->seo_name . '/%')->first();
        if ($old) {
            if (is_null($old->name_en)) {
                return PropRegion::where('url', 'like', '%/' . $item->seo_name . '/%')->update($arr);
            } else {
                return false;
            }
        } else {
            try {
                return VivinoRegion::create($arr)->vivino_id;
            } catch (QueryException $e) {
                return false;
            }
        }

    }


    public function createWinery($item)
    {

        if (isset($item->background_image->location) && $item->background_image->location) {
            $background = $item->background_image->location;
        } else {
            $background = null;
        }

        if (isset($item->region->background_image->location) && $item->region->background_image->location) {
            $background_sub = $item->region->background_image->location;
        } else {
            $background_sub = null;
        }

        $arr = [
            'address'        => $item->address ? json_encode($item->address, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null, // text
            'background'     => $this->fileSave('http:' . $background, 'winery', $item->id), // str 200
            'background_sub' => $this->fileSave('http:' . $background_sub, 'winery_sub', $item->id), // str 200
            'business_name'  => $item->business_name ? $item->business_name : null, // str 50
            'description'    => $item->description ? $item->description : null, // text
            'email'          => $item->email ? $item->email : null, // str 50
            'facebook'       => $item->facebook ? $item->facebook : null, // str 50
            'instagram'      => $item->instagram ? $item->instagram : null, // str 50
            'vivino_id'      => $item->id ? $item->id : null, // nr
            'name_en'        => $item->name ? $item->name : null,  // str 50
            'phone'          => $item->phone ? $item->phone : null, // str 50
            'seo_name'       => $item->seo_name ? $item->seo_name : null, // str 50
            'statistics'     => $item->statistics ? json_encode($item->statistics, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null, // text
            'twitter'        => $item->twitter ? $item->twitter : null,  // str 50
            'website'        => $item->website ? $item->website : null,  // str 50
            'wine_maker'     => $item->wine_maker ? json_encode($item->wine_maker, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null, // text
            'winemaker'      => $item->winemaker ? $item->winemaker : null, // text
            'winery_group'   => $item->winery_group ? json_encode($item->winery_group, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null, // text
        ];

        $old = PropManufacturers::where('url', 'like', '%/' . $item->seo_name . '/%')->first();

        if ($old && is_null($old->vivino_id)) {
            return PropManufacturers::where('url', 'like', '%/' . $item->seo_name . '/%')
                ->update([
                    'vivino_id' => $item->id
                ]);
        }

        try {
            return VivinoWinery::create($arr)->vivino_id;
        } catch (QueryException $e) {
            return false;
        }


    }


    public function createStyle($item)
    {

        if (isset($item->background_image->location) && $item->background_image->location) {
            $background = $this->fileSave('http:' . $item->background_image->location, 'style_background', $item->id);
        } else {
            $background = null;
        }
        if (isset($item->image) && $item->image) {
            $background2 = $this->fileSave($item->image, 'style_image', $item->id);
        } else {
            $background2 = null;
        }

        try {
            return VivinoStyle::create([
                'vivino_id'           => $item->id,
                'acidity'             => isset($item->acidity) ? $item->acidity : null,
                'acidity_description' => isset($item->acidity_description) ? $item->acidity_description : null,
                'background'          => $background, // img
                'blurb'               => isset($item->blurb) ? $item->blurb : null,
                'body'                => isset($item->body) ? $item->body : null,
                'body_description'    => isset($item->body_description) ? $item->body_description : null,
                'country'             => isset($item->country->code) ? $item->country->code : null,
                'description'         => isset($item->description) ? $item->description : null,
                'image'               => $background2, //img
                'interesting_facts'   => isset($item->interesting_facts) && $item->interesting_facts ? implode(PHP_EOL, $item->interesting_facts) : null,
                'name_en'             => isset($item->name) ? $item->name : null,
                'region'              => isset($item->region->id) ? $item->region->id : null,
                'regional_name'       => isset($item->regional_name) ? $item->regional_name : null,
                'seo_name'            => isset($item->seo_name) ? $item->seo_name : null,
                'varietal_name'       => isset($item->varietal_name) ? $item->varietal_name : null,
                'wine_type_id'        => isset($item->wine_type_id) ? $item->wine_type_id : null,
            ])->vivino_id;
        } catch (QueryException $e) {
            return false;
        }

    }


    public function makeUser($data)
    {
        try {
            return VivinoUser::create([
                'vivino_id' => $data->id,
                'seo_name'  => $data->seo_name,
                'alias'     => $data->alias,
                'avatar'    => $this->fileSave(
                    isset($data->image->variations->small_square) ? 'http:' . $data->image->variations->small_square : 'http:' . $data->image->location,
                    'avatar',
                    $data->id
                ),
            ])->vivino_id;
        } catch (QueryException $e) {
            return false;
        }

    }


    public function fileSave($path, $type, $name)
    {
        try {
            $manager = new ImageManager(array('driver' => 'gd'));
            $arrPath = explode('.', $path);
            $ext = array_pop($arrPath);
            $filename = $name . '.' . $ext;

            if (in_array($ext, ['svg'])) {
                $imgOriginal = file_get_contents($path);
            } else {
                $imgOriginal = $manager->make($path);
                $imgOriginal->response($ext);
            }


            if (\Storage::disk('public')->put('/props/' . $type . '/' . $filename, $imgOriginal)) {
                return 'public/props/' . $type . '/' . $filename;
            } else {
                return null;
            }
        } catch (\Exception $error) {
//            return null;
        }
    }

}
