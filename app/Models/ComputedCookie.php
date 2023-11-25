<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ComputedCookie
 *
 * @property int $id
 * @property string $component
 * @property string $property
 * @property int|null $int
 * @property string|null $str
 * @property array|null $json
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereStr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComputedCookie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ComputedCookie extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'json' => 'json'
    ];
}
