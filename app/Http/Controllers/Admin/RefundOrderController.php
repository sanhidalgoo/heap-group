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
        $grid->column('motive', __('orders.refund.motive'));
        $grid->column('request_date', __('orders.request-date'));
        $grid->column('approval_date', __('orders.approval-date'));
        $grid->column('delivery_date', __('orders.delivery-date'));
        $grid->column('state', __('orders.state'));
        $grid->column('created_at', __('orders.created-at'));
        $grid->column('updated_at', __('orders.updated-at'));
        $grid->column('order_id', __('orders.order-id'));

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
        $show->field('motive', __('orders.refund.motive'));
        $show->field('request_date', __('orders.request-date'));
        $show->field('approval_date', __('orders.approval-date'));
        $show->field('delivery_date', __('orders.delivery-date'));
        $show->field('state', __('orders.state'));
        $show->field('created_at', __('orders.created-at'));
        $show->field('updated_at', __('orders.updated-at'));
        $show->field('order_id', __('orders.order-id'));

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

        $form->text('motive', __('orders.motive'));
        $form->datetime('request_date', __('orders.request-date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('approval_date', __('orders.approval-date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('delivery_date', __('orders.delivery-date'))->default(date('Y-m-d H:i:s'));
        $form->text('state', __('orders.state'));
        $form->number('order_id', __('orders.order-id'));

        return $form;
    }
}
