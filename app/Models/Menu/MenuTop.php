<?php


namespace App\Models\Menu;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu\MenuTop
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu\MenuSub[] $submenu
 * @property-read int|null $submenu_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuTop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuTop extends Model
{

    protected $table = 'menu_top';
    protected $guarded = [];
//id	name	link	icon	menu_top_id	created_at	updated_at

    public function submenu(){
        return $this->hasMany(MenuSub::class,'menu_top_id','id');
    }

}
