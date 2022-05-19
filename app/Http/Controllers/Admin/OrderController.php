<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('orders.created.date'));
        $grid->column('updated_at', __('orders.updated-at'));
        $grid->column('total', __('orders.total'));
        $grid->column('order_state', __('orders.order.state'));
        $grid->column('payment_method', __('orders.payment.method'));
        $grid->column('department', __('orders.department'));
        $grid->column('city', __('orders.city'));
        $grid->column('address', __('orders.address'));
        $grid->column('user_id', __('orders.user-id'));
        $grid->column('refund_order_id', __('orders.refund-order-id'));

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('orders.created.date'));
        $show->field('updated_at', __('orders.updated-at'));
        $show->field('total', __('orders.total'));
        $show->field('order_state', __('orders.order.state'));
        $show->field('payment_method', __('orders.payment.method'));
        $show->field('department', __('orders.department'));
        $show->field('city', __('orders.city'));
        $show->field('address', __('orders.address'));
        $show->field('user_id', __('orders.user-id'));
        $show->field('refund_order_id', __('orders.refund-order-id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->decimal('total', __('orders.total'));
        $form->text('order_state', __('orders.order.state'));
        $form->text('payment_method', __('orders.payment.method'));
        $form->text('department', __('orders.department'));
        $form->text('city', __('orders.city'));
        $form->text('address', __('orders.address'));
        $form->number('user_id', __('orders.user-id'));
        $form->number('refund_order_id', __('orders.refund-order-id'));

        return $form;
    }
}
