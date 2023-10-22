<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with([
            'vivino.review', 'vivino.user', 'color', 'brand', 'country', 'region', 'subRegion', 'winery'
        ])->where('slug', request('slug'))->firstOrFail();

        $json = '';
        if ($product->vivino->vintage_id && $product->vivino->wine_id){
            $json = file_get_contents(asset("storage/vivino/json/" . $product->vivino->vintage_id . "_" . $product->vivino->wine_id . ".json"));
        }

        return view('product', [
            'product' => $product,
            'json' => json_decode($json)

        ]);
    }
}
