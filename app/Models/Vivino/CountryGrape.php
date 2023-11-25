<?php

namespace App\Models\Vivino;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryGrape extends Model
{
    use HasFactory;
    public $connection = 'vivino';
    public $guarded = [];
}
