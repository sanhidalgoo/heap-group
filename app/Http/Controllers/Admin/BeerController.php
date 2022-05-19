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
        $grid->column('name', __('Name'));
        $grid->column('brand', __('Brand'));
        $grid->column('origin', __('Origin'));
        $grid->column('abv', __('Abv'));
        $grid->column('ingredient', __('Ingredient'));
        //$grid->column('flavor', __('Flavor'));
        $grid->column('format', __('Format'));
        $grid->column('price', __('Price'));
        //$grid->column('details', __('Details'));
        $grid->column('quantity_available', __('Quantity available'));
        $grid->column('image_url', __('Image url'))->image();
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
        $show = new Show(Beer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('brand', __('Brand'));
        $show->field('origin', __('Origin'));
        $show->field('abv', __('Abv'));
        $show->field('ingredient', __('Ingredient'));
        $show->field('flavor', __('Flavor'));
        $show->field('format', __('Format'));
        $show->field('price', __('Price'));
        $show->field('details', __('Details'));
        $show->field('quantity_available', __('Quantity available'));
        $show->field('image_url', __('Image url'));
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
        $form = new Form(new Beer());

        $form->text('name', __('Name'));
        $form->text('brand', __('Brand'));
        $form->text('origin', __('Origin'));
        $form->decimal('abv', __('Abv'));
        $form->text('ingredient', __('Ingredient'));
        $form->text('flavor', __('Flavor'));
        $form->text('format', __('Format'));
        $form->decimal('price', __('Price'));
        $form->textarea('details', __('Details'));
        $form->number('quantity_available', __('Quantity available'));
        $form->text('image_url', __('Image url'));

        return $form;
    }
}
