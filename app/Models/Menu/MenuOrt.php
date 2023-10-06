<?php


namespace App\Models\Menu;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu\MenuOrt
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOrt whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuOrt extends Model
{

    protected $table = 'menu_ort';
    protected $guarded = [];

}
