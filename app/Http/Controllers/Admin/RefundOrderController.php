<?php

namespace App\Http\Controllers\Admin;

use App\Models\RefundOrder;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefundOrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefundOrder';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefundOrder());

        $grid->column('id', __('Id'));
        $grid->column('motive', __('Motive'));
        $grid->column('request_date', __('Request date'));
        $grid->column('approval_date', __('Approval date'));
        $grid->column('delivery_date', __('Delivery date'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('order_id', __('Order id'));

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
        $show = new Show(RefundOrder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('motive', __('Motive'));
        $show->field('request_date', __('Request date'));
        $show->field('approval_date', __('Approval date'));
        $show->field('delivery_date', __('Delivery date'));
        $show->field('state', __('State'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('order_id', __('Order id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefundOrder());

        $form->text('motive', __('Motive'));
        $form->datetime('request_date', __('Request date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('approval_date', __('Approval date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('delivery_date', __('Delivery date'))->default(date('Y-m-d H:i:s'));
        $form->text('state', __('State'));
        $form->number('order_id', __('Order id'));

        return $form;
    }
}
