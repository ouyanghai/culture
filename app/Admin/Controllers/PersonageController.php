<?php

namespace App\Admin\Controllers;

use App\Models\Personage;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PersonageController extends Controller
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
            ->header('Index')
            ->description('description')
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
            ->header('Detail')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Personage);

        $grid->name('Name');
        $grid->height('Height');
        $grid->weight('Weight');
        $grid->type('Type');
        $grid->introduction('Introduction');
        $grid->cid('Cid');
        $grid->rid('Rid');
        $grid->stime('Stime');
        $grid->etime('Etime');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Personage::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->height('Height');
        $show->weight('Weight');
        $show->type('Type');
        $show->introduction('Introduction');
        $show->cid('Cid');
        $show->rid('Rid');
        $show->stime('Stime');
        $show->etime('Etime');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Personage);

        $form->select('cid', '国家')->options('/admin/api/data/country');
        $form->select('rid', '宗教')->options('/admin/api/data/religion');
        $form->text('name', 'Name');
        $form->number('height', 'Height');
        $form->number('weight', 'Weight');
        $form->text('type', 'Type');
        $form->textarea('introduction', 'Introduction');
        $form->text('stime', 'Stime');
        $form->text('etime', 'Etime');

        return $form;
    }
}
