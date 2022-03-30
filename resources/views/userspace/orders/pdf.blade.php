<div class="card mb-3 px-2">
    <div class="card-body">
        <div class="row mb-4">
            <h3 class="col-8 fw-bold">
                # {{ $order->getId() }}
            </h3>
        </div>
        <div class="row">
            <p class="col-6">
                <strong>{{ __('orders.order.state') }}:</strong>
                {{ $order->getOrderState() }}
            </p>
            <h5 class="col-6 fw-bold text-end">
                {{ $order->getCreatedAt() }}
            </h5>
        </div>
        <div class="row">
            <p class="card-text col"><strong>{{ __('orders.city') }}:
                </strong>{{ $order->getCity() }}</p>
            <p class="card-text col"><strong>{{ __('orders.department') }}:
                </strong>{{ $order->getDepartment() }}</p>
            <p class="card-text col"><strong>{{ __('orders.address') }}:
                </strong>{{ $order->getAddress() }}</p>
        </div>
        <p class="card-text">
            <strong>{{ __('orders.payment.method') }}:</strong>
            {{ $order->getPaymentMethod() }}
        </p>
    </div>
    <table>
        @foreach ($orderItems as $orderItem)
        <tr>
            <td>
                <h4 class="fw-bold">{{ $orderItem->beer->getName() }}</h4>
                {{ $orderItem->beer->getFormat() }}
                <br/>
                {{ 'Quantity: ' . $orderItem->getQuantity() }}
            </td>
            <td>
                <h5 class="fw-bold">{{ $orderItem->beer->getPrice() . ' ' . __('beers.currency') }}</h5>
            </td>
        </tr>
        @endforeach
        <h2 class="fw-bold text-center mb-5">
            {{ __('cart.total') }}: {{ $order->getTotal() . ' ' . __('beers.currency') }}
        </h2>
    </table>
</div>
