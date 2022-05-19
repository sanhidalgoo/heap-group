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
        $grid->column('comment', __('reviews.comment'));
        $grid->column('score', __('reviews.score'));
        $grid->column('user_id', __('reviews.user-id'));
        $grid->column('beer_id', __('reviews.beer-id'));
        $grid->column('created_at', __('reviews.created-at'));
        $grid->column('updated_at', __('reviews.updated-at'));

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
        $show->field('comment', __('reviews.comment'));
        $show->field('score', __('reviews.score'));
        $show->field('user_id', __('reviews.user-id'));
        $show->field('beer_id', __('reviews.beer-id'));
        $show->field('created_at', __('reviews.created-at'));
        $show->field('updated_at', __('reviews.updated-at'));

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

        $form->text('comment', __('reviews.comment'));
        $form->text('score', __('reviews.score'));
        $form->number('user_id', __('reviews.user-id'));
        $form->number('beer_id', __('reviews.beer-id'));

        return $form;
    }
}
