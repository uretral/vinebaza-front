<?php

namespace App\Models\Vivino;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StyleCountry extends Model
{
    use HasFactory;
    protected $connection = 'vivino';
    protected $guarded = [];
}
