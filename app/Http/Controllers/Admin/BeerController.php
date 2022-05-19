<?php

namespace App\Http\Controllers\Admin;

use App\Models\Beer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BeerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Beer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Beer());

        $grid->column('id', __('Id'));
        $grid->column('name', __('beers.name'));
        $grid->column('brand', __('beers.brand'));
        $grid->column('origin', __('beers.origin'));
        $grid->column('abv', __('beers.abv'));
        $grid->column('ingredient', __('beers.ingredient'));
        //$grid->column('flavor', __('beers.flavor'));
        $grid->column('format', __('beers.format'));
        $grid->column('price', __('beers.price'));
        //$grid->column('details', __('Details'));
        $grid->column('quantity_available', __('beers.quantity'));
        $grid->column('image_url', __('beers.image-url'))->image();
        $grid->column('created_at', __('beers.created-at'));
        $grid->column('updated_at', __('beers.updated-at'));

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
        $show = new Show(Beer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('beers.name'));
        $show->field('brand', __('beers.brand'));
        $show->field('origin', __('beers.origin'));
        $show->field('abv', __('beers.abv'));
        $show->field('ingredient', __('beers.ingredient'));
        $show->field('flavor', __('beers.flavor'));
        $show->field('format', __('beers.format'));
        $show->field('price', __('beers.price'));
        $show->field('details', __('beers.details'));
        $show->field('quantity_available', __('beers.quantity'));
        $show->field('image_url', __('beers.image-url'));
        $show->field('created_at', __('beers.created-at'));
        $show->field('updated_at', __('beers.updated-at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Beer());

        $form->text('name', __('beers.name'));
        $form->text('brand', __('beers.brand'));
        $form->text('origin', __('beers.origin'));
        $form->decimal('abv', __('beers.abv'));
        $form->text('ingredient', __('beers.ingredient'));
        $form->text('flavor', __('beers.flavor'));
        $form->text('format', __('beers.format'));
        $form->decimal('price', __('beers.price'));
        $form->textarea('details', __('beers.details'));
        $form->number('quantity_available', __('beers.quantity'));
        $form->text('image_url', __('beers.image-url'));

        return $form;
    }
}
