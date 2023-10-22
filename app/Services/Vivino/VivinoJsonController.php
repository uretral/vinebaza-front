<?php
namespace App\Services\Vivino;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Vivino;
use App\Models\Props\VivinoReview;

class VivinoJsonController extends Controller
{

    public $id = null;
    public $json = null;
    public $price = null;
    public $ratings_average = null;
    public $ratings_count = null;
    public $reviews_count = null;
    public $review_id = null;
    public $review_user_id = null;


    public function index(){
        $item = Vivino::where('id','>', \request()->get('prevID'))->first();
        $this->id = $item->id;
        $this->getJson($item);
        $this->price();
        $this->rating();
        $this->review($item);

        return [
            'id' =>  $item->id,
            'json' => $this->json ? 1 : 0,
            'state' => Vivino::whereId($this->id)->update([
                'price' => $this->price,
                'ratings_average' => $this->ratings_average,
                'ratings_count' => $this->ratings_count,
                'reviews_count' => $this->reviews_count,
                'review_id' => $this->review_id,
                'review_user_id' => $this->review_user_id
            ])

        ];

    }


    public function getJson($item){
//        $file = 'http://vinobaza.tmweb.ru/storage/vivino/json/'.$item->vintage_id.'_'.$item->wine_id.'.json';
//        $Headers = @get_headers($file);
//        if(strpos('200', $Headers[0])) {
//            $json = file_get_contents($file);
//            $this->json = json_decode($json);
//        } else {
//            $this->json = null;
//        }
        $file = \Storage::path('public/vivino/json/'.$item->vintage_id.'_'.$item->wine_id.'.json');
        if(file_exists($file)){
            $this->json = json_decode(file_get_contents($file));
        }
    }

    public function price(){
        $this->price = isset($this->json->info->price->amount)  ? $this->json->info->price->amount : null;
    }
    public function rating(){

        if (isset($this->json->info->vintage->statistics)) {
            $this->ratings_average = $this->json->info->vintage->statistics->ratings_average;
            $this->ratings_count = $this->json->info->vintage->statistics->ratings_count;
            $this->reviews_count = $this->json->info->vintage->statistics->reviews_count;
        }
        else if (isset($this->json->info->vintage->wine->statistics)) {
            $this->ratings_average = $this->json->info->vintage->wine->statistics->ratings_average;
            $this->ratings_count = $this->json->info->vintage->wine->statistics->ratings_count;
            $this->reviews_count = $this->json->info->vintage->wine->statistics->reviews_count;
        }
        else {
            $this->ratings_average = null;
            $this->ratings_count = null;
            $this->reviews_count = null;
        }
    }
    public function review($item){

        $review =  VivinoReview::where('vintage_id',$item->vintage_id)
            ->where('wine_id',$item->wine_id)->where('rating', '>', 4)->first();
        if($review){
            $this->review_id = $review->id;
            $this->review_user_id = $review->user;
        }

    }
}
