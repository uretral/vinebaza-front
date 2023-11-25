<?php

namespace App\Models\Vivino;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineFact extends Model
{
    use HasFactory;

    protected $connection = 'vivino';
    protected $guarded = [];
}
