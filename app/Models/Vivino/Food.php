<?php

namespace App\Models\Vivino;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Food extends Model
{
    use HasFactory;

    public $connection = 'vivino';
    public $guarded = [];

    public function background_image(): HasManyThrough
    {
        return $this->hasManyThrough(
            BackgroundImage::class,
            WineFood::class,
            'wine_id', // wine_food
            'parent_id', // background_images
            'food_id', // Food
            'food_id' // wine_food
        );
    }



}
