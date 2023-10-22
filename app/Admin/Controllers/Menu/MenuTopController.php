<?php


namespace App\Admin\Controllers\Menu;


use App\Http\Controllers\Controller;
use App\Models\Menu\MenuTop as TomMenu;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Tab;


class MenuTopController extends Controller
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
        $grid = new Grid(new TomMenu);

        $grid->id('ID');
        $grid->name('name');
        $grid->icon('icon');
        $grid->link('link');
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
        $show = new Show(TomMenu::findOrFail($id));

        $show->id('ID');
        $show->name('name');
        $show->icon('icon');
        $show->link('link');
//        $show->created_at(trans('admin.created_at'));
//        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TomMenu);
        $form->tab('Ссылка', function ($form) {
            $form->display('ID');
            $form->text('name', 'Название');
            $form->image('icon', 'Иконка');
            $form->text('link', 'Ссылка');
        });

        $form->tab('Дочерние', function ($form) {
            $form->hasMany('submenu', function (Form\NestedForm $form) {
                $form->text('name','Название');
                $form->image('icon','Иконка');
                $form->text('link','Ссылка');
            });
        });






//        $form->display(trans('admin.created_at'));
//        $form->display(trans('admin.updated_at'));
        return $form;
    }
}
