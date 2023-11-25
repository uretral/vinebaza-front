<?php

namespace App\Services\Vivino;

use App\Models\Catalog\Product;
use App\Models\Catalog\Vivino;
use App\Services\Vivino\Selenium\VivinoSearch;
use Illuminate\Http\Request;

class VivinoService
{
    public mixed $value;

    public function async()
    {
        $request = request()->all();
        $func = $request['func'];
        return call_user_func_array([__CLASS__, $func], [$request]);
    }

    /*call_user_func*/

    public function search($data)
    {
        return $this->getProduct($data['id']);
    }


    public function vivinoSearch($arrRequest)
    {
        $test = new VivinoSearch();
        return $test->handle($arrRequest['name']);
    }


    /*Inner methods*/

    public function getProduct($prevID)
    {
        $id = Product::where('id', '>', $prevID)->min('id');
        $product = Product::whereId($id)->first();
        $vivino = Vivino::where('product_code', $product->code)->first();
//        if (is_null($vivino)) {
        return $product;
//        } else {
//            return 'double';
//        }
    }


}
