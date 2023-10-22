<?php

namespace App\Models\Staff;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Staff\Stores
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string $name
 * @property string|null $logo
 * @property string|null $discount
 * @property string|null $offers_cnt
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stores newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereOffersCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stores withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Stores withoutTrashed()
 * @mixin \Eloquent
 */
class Stores extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
