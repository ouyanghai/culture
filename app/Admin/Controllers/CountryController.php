<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CountryController extends Controller
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
        $grid = new Grid(new Country);
        $grid->fid('朝代');
        $grid->name('Name');
        $grid->capital('Capital');
        $grid->introduction('Introduction');

        $grid->stime('Stime');
        $grid->etime('Etime');

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
        $show = new Show(Country::findOrFail($id));

        $show->id('Id');
        $show->fid('Fid');
        $show->name('Name');
        $show->capital('Capital');
        $show->introduction('Introduction');
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
        $form = new Form(new Country);
        $form->select('fid','朝代')->options('/admin/api/data/dynasty');
        $form->text('name', '名称');
        $form->text('capital', '首都');
        $form->textarea('introduction', '简介');
        $form->text('stime', '建立时间');
        $form->text('etime', '结束时间');

        return $form;
        
    }
}
