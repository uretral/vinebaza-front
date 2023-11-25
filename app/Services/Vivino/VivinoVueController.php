<?php


namespace App\Services\Vivino;


use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Models\System\File;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\ImageManager;
use Symfony\Component\DomCrawler\Crawler;

class VivinoVueController extends Controller
{
    public $values;

    public function async()
    {
        $request = request()->all();
        $func = $request['func'];
        return call_user_func_array([__CLASS__, $func], [$request]);
    }

    public function getProduct($prevID)
    {
        $id = Product::where('id', '>', $prevID)->min('id');
        $product = Product::whereId($id)->first();
        $vivino = Vivino::where('product_code', $product->code)->first();
        if (is_null($vivino)) {
            return $product;
        } else {
            return 'double';
        }
    }

    public function search($data)
    {
        return $this->getProduct($data['id']);
    }

    public function getContent($link)
    {
        try {
            Artisan::call('vivino:search', ['string' => $link]);
            return Artisan::output();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function vivinoSearch($data)
    {
        $name = $data['name'];
        $name = explode(' ', $name);
        $name = implode('+', $name);
        $output = shell_exec('casperjs ' . base_path('resources/casper/phantom/vivino-search.js '). ' ' . $name);
        $link = 'nothing';
        $crawler = new Crawler($output);
        if ($crawler->filter('.card')->count()) {
            $res = $crawler->filter('.card')->eq(0)->html();
            $li = new Crawler($res);
            $link = $li->filter('a')->eq(0)->attr('href');
        }
        return $link;
    }

    public function vivinoJson($data)
    {
        $json = shell_exec('casperjs ' . base_path('resources/casper/phantom/vivino-get-json.js ') . ' ' . $data['link']);
        if ($json) {
            $ob = json_decode($json);
            $vintage = $ob->info->vintage->id;
            $wine = $ob->info->vintage->wine->id;

            \Storage::disk('public')->put('/vivino/json/' . $vintage . '_' . $wine . '.json', $json);
            $image = $ob->info->vintage->image;


            return [
                'info'         => $ob->info ? true : false,
                'tastes'       => $ob->tastes ? true : false,
                'tastesReview' => $ob->tastesReview ? true : false,
                'scoredReview' => $ob->scoredReview ? true : false,
                'v_w_code'     => $wine ? $wine : false,
                'vivinoName'   => $ob->info->vintage->name ? $ob->info->vintage->name : false,
                'image'        => $ob->info->vintage->image ? $ob->info->vintage->image : false,
            ];

        } else {
            return false;
        }

    }


    public function saveJsonData($data)
    {
        $find = Vivino::where('vintage_id', $data['row']['v_s_code'])->where('wine_id', $data['row']['v_w_code'])->first();
        $fileName = $data['row']['v_s_code'] . '_' . $data['row']['v_w_code'] . '.json';
        $json_path = '/app/public/vivino/json/' . $fileName;
        $img = $data['row']['image'] ? $this->imageSave($data['row']['image'], $data['row']['p_id'], 0) : null;

        if ($find) {
            $update = $find->update([
                'product_id'   => $data['row']['p_id'],
                'product_code' => $data['row']['p_code'],
                'name'         => $data['row']['vivinoName'],
                'vintage_id'   => $data['row']['v_s_code'],
                'wine_id'      => $data['row']['v_w_code'],
                'info'         => $data['row']['info'],
                'tastes'       => $data['row']['tastes'],
                'tastesReview' => $data['row']['tastesReview'],
                'scoredReview' => $data['row']['scoredReview'],
                'json_path'    => $json_path,
                'image'        => $img,
            ]);

            if ($update) {
                return 1;
            } else {
                return 0;
            }

        } else {
            return Vivino::create([
                'product_id'   => $data['row']['p_id'],
                'product_code' => $data['row']['p_code'],
                'name'         => $data['row']['vivinoName'],
                'vintage_id'   => $data['row']['v_s_code'],
                'wine_id'      => $data['row']['v_w_code'],
                'info'         => $data['row']['info'],
                'tastes'       => $data['row']['tastes'],
                'tastesReview' => $data['row']['tastesReview'],
                'scoredReview' => $data['row']['scoredReview'],
                'json_path'    => $json_path,
                'image'        => $img,
            ])->id;
        }
    }

    public function imageSave($path, $product_id, $key)
    {
        $path = 'http:' . $path;
        try {
            $manager = new ImageManager(array('driver' => 'gd'));
            $arrPath = explode('.', $path);
            $ext = array_pop($arrPath);
            $filename = $product_id . '_' . $key . '.' . $ext;

            $imgOriginal = $manager->make($path);
            $imgOriginal->response($ext);

            $imgMiddle = $manager->make($path);
            $imgMiddle->resize(null, '452', function ($constraint) {
                $constraint->aspectRatio();
            })->response($ext);

            $imgThumb = $manager->make($path);
            $imgThumb->resize(null, '185', function ($constraint) {
                $constraint->aspectRatio();
            })->response($ext);

            \Storage::disk('public')->put('/uploads/v/middle/' . $filename, $imgMiddle);
            \Storage::disk('public')->put('/uploads/v/thumb/' . $filename, $imgThumb);

            if (\Storage::disk('public')->put('/uploads/v/orig/' . $filename, $imgOriginal)) {

//                $file = File::where('name', $filename)->where('from', 'vivino')->first();

/*                File::updateOrCreate([['product_id' => $product_id, 'from' => 'vivino']],[
                    'product_id' => $product_id,
                    'name'       => $filename,
                    'type'       => 'image',
                    'from'       => 'vivino',
                ]);*/

                $fileRecord = File::where('product_id', $product_id)->where('from', 'vivino')->first();

                if (is_null($fileRecord)) {
                    File::create([
                        'product_id' => $product_id,
                        'name'       => $filename,
                        'type'       => 'image',
                        'from'       => 'vivino',
                    ]);
                } else {
                    $fileRecord->update(['name' => $filename]);
                }
                return true;
            } else {
                return null;
            }


        } catch (\Exception $error) {
//            return null;
            dump($error);
        }
    }


    public function props($data)
    {
        $res = new PropController($data['row']['v_s_code'], $data['row']['v_w_code'], $data['case']);
        return json_encode($res);
    }


    public function vivinoT($data)
    {
        $json = shell_exec('casperjs ' . base_path('resources/casper/phantom/vivino-item-json.js ') . ' ' .' https://www.vivino.com/wines/' . $data['link']);
        if ($json) {
            \Storage::disk('public')->put('/vivino/json/' . $data['link'] . '.json', $json);
        }
        return $json;

    }
}
