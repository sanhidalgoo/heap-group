@extends('userspace.layouts.app')
@section('title', __('cart.title'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                @foreach ($viewData['beersInCart'] as $beerItem)
                    <div class="row align-items-center mb-4">
                        <div class="col-sm-1">
                            <img src="{{ $beerItem['beer']->getURL() }}" class="img-fluid">
                        </div>
                        <div class="col-sm-5 col-lg-3">
                            <h4 class="fw-bold">{{ $beerItem['beer']->getName() }}</h4>
                            {{ $beerItem['beer']->getFormat() }}
                            <span
                                class="text-warning d-block mt-3 fw-bold">{{ $beerItem['beer']->getQuantity() . ' ' . __('cart.in.stock') }}</span>
                        </div>
                        <div class="col-sm-6 col-lg-2">
                            <h5 class="fw-bold">{{ $beerItem['beer']->getPrice() . ' ' . __('beers.currency') }}
                            </h5>
                        </div>
                        <div class="col-sm-6 col-lg-3 m-auto d-flex justify-content-between align-items-center">
                            <form method="POST"
                                action="{{ route('user.cart.decrement', ['id' => $beerItem['beer']->getId()]) }}"
                                class="d-inline-block p-0">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </form>
                            <span class="fw-bold">
                                {{ $beerItem['quantity'] }}
                            </span>

                            <form method="POST"
                                action="{{ route('user.cart.increment', ['id' => $beerItem['beer']->getId()]) }}"
                                class="d-inline-block p-0">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>

                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <form method="POST"
                                action="{{ route('user.cart.remove', ['id' => $beerItem['beer']->getId()]) }}"
                                class="d-inline-block p-0">
                                @csrf
                                <button type="submit" class="btn btn-danger beer-card__btn--block">
                                    {{ __('cart.remove.button') }}
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="fw-bold text-center mb-5">
                {{ __('cart.total') }}: {{ $viewData['total'] . ' ' . __('beers.currency') }}
            </h2>
        </div>
    </div>

    <form method="POST" action="{{ route('user.orders.save') }}">
        @csrf
        <h2 class="text-center">
            {{ __('cart.order.title') }}
        </h2>
        <div class="row">
            <div class="col-12 mb-2">
                <select class="form-select" name="paymentMethod">
                    <option value="CREDIT_CARD">{{ __('billing.payment-method.credit-card') }}</option>
                    <option value="CASH">{{ __('billing.payment-method.cash') }}</option>
                    <option value="PSE">{{ __('billing.payment-method.pse') }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control mb-2" placeholder={{ __('billing.department') }} name="department"
                    value="{{ old('department') }}" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control mb-2" placeholder={{ __('billing.city') }} name="city"
                    value="{{ old('city') }}" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control mb-2" placeholder={{ __('billing.address') }} name="address"
                    value="{{ old('address') }}" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary beer-card__btn beer-card__btn--block">{{ __('cart.confirm') }}</button>
    </form>
    <br />
    <br />
    <br />
@endsection
