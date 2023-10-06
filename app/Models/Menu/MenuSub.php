<?php


namespace App\Models\Menu;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu\MenuSub
 *
 * @property int $id
 * @property int $menu_top_id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $link
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Menu\MenuOrt[] $menuort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $menuort_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereMenuTopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereMenuort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSub whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuSub extends Model
{

    protected $table = 'menu_sub';
    protected $guarded = [];

    public function menuort(){
        return $this->hasMany(MenuOrt::class,'menu_sub_id','id');
    }

}
