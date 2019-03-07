<?php

namespace App\Admin\Controllers;

use App\Models\Incident;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class IncidentController extends Controller
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
        $grid = new Grid(new Incident);

        $grid->id('Id');
        $grid->title('Title');
        $grid->country_id('Country id');
        $grid->type('Type');
        $grid->introduction('Introduction');
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
        $show = new Show(Incident::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->country_id('Country id');
        $show->type('Type');
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
        $form = new Form(new Incident);

        $form->text('title', 'Title');
        $form->number('country_id', 'Country id');
        $form->number('type', 'Type');
        $form->textarea('introduction', 'Introduction');
        $form->text('stime', 'Stime');
        $form->text('etime', 'Etime');

        return $form;
    }
}
