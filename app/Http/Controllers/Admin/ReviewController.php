<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Review';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->column('id', __('Id'));
        $grid->column('comment', __('Comment'));
        $grid->column('score', __('Score'));
        $grid->column('user_id', __('User id'));
        $grid->column('beer_id', __('Beer id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('comment', __('Comment'));
        $show->field('score', __('Score'));
        $show->field('user_id', __('User id'));
        $show->field('beer_id', __('Beer id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Review());

        $form->text('comment', __('Comment'));
        $form->text('score', __('Score'));
        $form->number('user_id', __('User id'));
        $form->number('beer_id', __('Beer id'));

        return $form;
    }
}
