@extends('userspace.layouts.app')
@section('title', __('orders.title'))
@section('content')
    <div class="card mb-3 px-2">
        <div class="card-body">
            <div class="row mb-4">
                <h3 class="col-8 fw-bold">
                    # {{ $viewData['order']->getId() }}
                </h3>
                <a class="col-2 btn btn-primary"
                    href="{{ route('user.orders.download', ['id' => $viewData['order']->getId()]) }}">
                    <i class="fa-solid fa-file-pdf"></i>
                    Download PDF
                </a>
                <a class="col-2 btn btn-danger"
                    href="{{ route('user.orders.refund', ['id' => $viewData['order']->getId()]) }}">
                    <i class="fa-solid fa-file-pdf"></i>
                    Refund Order
                </a>
            </div>
            <div class="row">
                <p class="col-6">
                    <strong>{{ __('orders.order.state') }}:</strong>
                    {{ $viewData['order']->getOrderState() }}
                </p>
                <h5 class="col-6 fw-bold text-end">
                    {{ $viewData['order']->getCreatedAt() }}
                </h5>
            </div>
            <div class="row">
                <p class="card-text col"><strong>{{ __('orders.city') }}:
                    </strong>{{ $viewData['order']->getCity() }}</p>
                <p class="card-text col"><strong>{{ __('orders.department') }}:
                    </strong>{{ $viewData['order']->getDepartment() }}</p>
                <p class="card-text col"><strong>{{ __('orders.address') }}:
                    </strong>{{ $viewData['order']->getAddress() }}</p>
            </div>
            <p class="card-text">
                <strong>{{ __('orders.payment.method') }}:</strong>
                {{ $viewData['order']->getPaymentMethod() }}
            </p>
        </div>
        <div class="card-body">
            @foreach ($viewData['orderItems'] as $orderItem)
                <div class="row align-items-center text-center mb-4">
                    <div class="col-sm-4">
                        <img style="height: 125px" src="{{ $orderItem->beer->getURL() }}" class="img-fluid">
                    </div>
                    <div class="col-sm-4">
                        <h4 class="fw-bold">{{ $orderItem->beer->getName() }}</h4>
                        {{ $orderItem->beer->getFormat() }}
                        <br />
                        {{ 'Quantity: ' . $orderItem->getQuantity() }}
                    </div>
                    <div class="col-sm-4">
                        <h5 class="fw-bold">{{ $orderItem->beer->getPrice() . ' ' . __('beers.currency') }}</h5>
                    </div>
                </div>
            @endforeach
            <h2 class="fw-bold text-center mb-5">
                {{ __('cart.total') }}: {{ $viewData['order']->getTotal() . ' ' . __('beers.currency') }}
            </h2>
        </div>
    </div>
@endsection
