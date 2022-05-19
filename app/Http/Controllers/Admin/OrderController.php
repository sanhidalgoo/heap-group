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
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('total', __('Total'));
        $grid->column('order_state', __('Order state'));
        $grid->column('payment_method', __('Payment method'));
        $grid->column('department', __('Department'));
        $grid->column('city', __('City'));
        $grid->column('address', __('Address'));
        $grid->column('user_id', __('User id'));
        $grid->column('refund_order_id', __('Refund order id'));

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
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('total', __('Total'));
        $show->field('order_state', __('Order state'));
        $show->field('payment_method', __('Payment method'));
        $show->field('department', __('Department'));
        $show->field('city', __('City'));
        $show->field('address', __('Address'));
        $show->field('user_id', __('User id'));
        $show->field('refund_order_id', __('Refund order id'));

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

        $form->decimal('total', __('Total'));
        $form->text('order_state', __('Order state'));
        $form->text('payment_method', __('Payment method'));
        $form->text('department', __('Department'));
        $form->text('city', __('City'));
        $form->text('address', __('Address'));
        $form->number('user_id', __('User id'));
        $form->number('refund_order_id', __('Refund order id'));

        return $form;
    }
}
