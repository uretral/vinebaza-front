<?php

namespace App\Admin\Controllers\Donors;

use App\Models\Donors\DonorProduct;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DonorProductContainer extends Controller
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
        $grid = new Grid(new DonorProduct);

        $grid->id('ID');
        $grid->product_id('product_id');
        $grid->category_id('category_id');
        $grid->donor_id('donor_id');
        $grid->code('code');
        $grid->articul('articul');
        $grid->stock('stock');
        $grid->url('url');
        $grid->price('price');
        $grid->price_discount('price_discount');
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
        $show = new Show(DonorProduct::findOrFail($id));

        $show->id('ID');
        $show->product_id('product_id');
        $show->category_id('category_id');
        $show->donor_id('donor_id');
        $show->code('code');
        $show->articul('articul');
        $show->stock('stock');
        $show->url('url');
        $show->price('price');
        $show->price_discount('price_discount');
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
        $form = new Form(new DonorProduct);

        $form->display('ID');
        $form->text('product_id', 'product_id');
        $form->text('category_id', 'category_id');
        $form->text('donor_id', 'donor_id');
        $form->text('code', 'code');
        $form->text('articul', 'articul');
        $form->text('stock', 'stock');
        $form->text('url', 'url');
        $form->text('price', 'price');
        $form->text('price_discount', 'price_discount');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
