<?php

namespace App\Models\Vivino;

use App\Traits\Model\VivinoHeadless;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Wine extends Model
{
    use HasFactory;

    protected $connection = 'vivino';
    protected $guarded = [];
    public $incrementing = false;
    public $with = ['foods'];



    public function foods(): HasManyThrough
    {
        return $this->hasManyThrough(
            Food::class,
            WineFood::class,
            'wine_id', // wine_food
            'id', // Food
            'food_id', //  Wine
            'food_id' // wine_food
        );
    }

    public function grapes(): HasManyThrough
    {
        return $this->hasManyThrough(
            Grape::class,
            WineGrape::class,
//            'wine_id', // wine_food
//            'id', // Food
//            'grape_id', //  Wine
//            'food_id' // wine_food
        );
    }
}
