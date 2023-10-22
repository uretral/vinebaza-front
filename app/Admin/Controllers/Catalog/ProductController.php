<?php

namespace App\Admin\Controllers\Catalog;

use App\Models\Catalog\Product;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProductController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->id('ID');
        $grid->slug('slug');
        $grid->name('name');
        $grid->translit('translit');
        $grid->articul('articul');
        $grid->code('code');
        $grid->picture('picture');
        $grid->picture_small('picture_small');
        $grid->category_id('category_id');
        $grid->type_id('type_id');
        $grid->color_id('color_id');
        $grid->sugar_id('sugar_id');
        $grid->country_id('country_id');
        $grid->region_id('region_id');
        $grid->sub_region_id('sub_region_id');
        $grid->manufacturer_id('manufacturer_id');
        $grid->stock_id('stock_id');
        $grid->brand_id('brand_id');
        $grid->grapes('grapes');
        $grid->pairings('pairings');
        $grid->tastes('tastes');
        $grid->grape_percentage('grape_percentage');
        $grid->strength('strength');
        $grid->volume('volume');
        $grid->volume_type('volume_type');
        $grid->notes_color('notes_color');
        $grid->notes_taste('notes_taste');
        $grid->notes_aroma('notes_aroma');
        $grid->notes_pairing('notes_pairing');
        $grid->color_depth('color_depth');
        $grid->richness('richness');
        $grid->serving_temperature('serving_temperature');
        $grid->storage_capacity('storage_capacity');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->id('ID');
        $show->slug('slug');
        $show->name('name');
        $show->translit('translit');
        $show->articul('articul');
        $show->code('code');
        $show->picture('picture');
        $show->picture_small('picture_small');
        $show->category_id('category_id');
        $show->type_id('type_id');
        $show->color_id('color_id');
        $show->sugar_id('sugar_id');
        $show->country_id('country_id');
        $show->region_id('region_id');
        $show->sub_region_id('sub_region_id');
        $show->manufacturer_id('manufacturer_id');
        $show->stock_id('stock_id');
        $show->brand_id('brand_id');
        $show->grapes('grapes');
        $show->pairings('pairings');
        $show->tastes('tastes');
        $show->grape_percentage('grape_percentage');
        $show->strength('strength');
        $show->volume('volume');
        $show->volume_type('volume_type');
        $show->notes_color('notes_color');
        $show->notes_taste('notes_taste');
        $show->notes_aroma('notes_aroma');
        $show->notes_pairing('notes_pairing');
        $show->color_depth('color_depth');
        $show->richness('richness');
        $show->serving_temperature('serving_temperature');
        $show->storage_capacity('storage_capacity');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        $form->display('ID');
        $form->text('slug', 'slug');
        $form->text('name', 'name');
        $form->text('translit', 'translit');
        $form->text('articul', 'articul');
        $form->text('code', 'code');
        $form->text('picture', 'picture');
        $form->text('picture_small', 'picture_small');
        $form->text('category_id', 'category_id');
        $form->text('type_id', 'type_id');
        $form->text('color_id', 'color_id');
        $form->text('sugar_id', 'sugar_id');
        $form->text('country_id', 'country_id');
        $form->text('region_id', 'region_id');
        $form->text('sub_region_id', 'sub_region_id');
        $form->text('manufacturer_id', 'manufacturer_id');
        $form->text('stock_id', 'stock_id');
        $form->text('brand_id', 'brand_id');
        $form->text('grapes', 'grapes');
        $form->text('pairings', 'pairings');
        $form->text('tastes', 'tastes');
        $form->text('grape_percentage', 'grape_percentage');
        $form->text('strength', 'strength');
        $form->text('volume', 'volume');
        $form->text('volume_type', 'volume_type');
        $form->text('notes_color', 'notes_color');
        $form->text('notes_taste', 'notes_taste');
        $form->text('notes_aroma', 'notes_aroma');
        $form->text('notes_pairing', 'notes_pairing');
        $form->text('color_depth', 'color_depth');
        $form->text('richness', 'richness');
        $form->text('serving_temperature', 'serving_temperature');
        $form->text('storage_capacity', 'storage_capacity');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
