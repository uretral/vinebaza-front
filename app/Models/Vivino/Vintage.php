<?php

namespace App\Models\Vivino;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vintage extends Model
{
    use HasFactory;

    protected $connection = 'vivino';
    protected $guarded = [];
    public $incrementing = false;

    protected $casts = [
        'grape_composition' => 'array',
        'ratings_distribution' => 'array',
    ];
}
