<?php

namespace App\Admin\Controllers;

use App\Models\Work;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WorkController extends Controller
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
        $grid = new Grid(new Work);

        $grid->id('Id');
        $grid->author_id('Author id');
        $grid->name('Name');
        $grid->type('Type');
        $grid->introduction('Introduction');
        $grid->content('Content');
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
        $show = new Show(Work::findOrFail($id));

        $show->id('Id');
        $show->author_id('Author id');
        $show->name('Name');
        $show->type('Type');
        $show->introduction('Introduction');
        $show->content('Content');
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
        $form = new Form(new Work);

        $form->number('author_id', 'Author id');
        $form->text('name', 'Name');
        $form->number('type', 'Type');
        $form->textarea('introduction', 'Introduction');
        $form->textarea('content', 'Content');
        $form->text('stime', 'Stime');
        $form->text('etime', 'Etime');

        return $form;
    }
}
