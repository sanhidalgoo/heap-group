@extends('userspace.layouts.app')
@section('title', __('cart.title'))
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>beers in cart</h1>
                <ul>
                    @foreach ($viewData['beersInCart'] as $beer)
                        <li>
                            Id: {{ $beer['beer']->getId() }} -
                            Name: {{ $beer['beer']['name'] }} -
                            Price: {{ $beer['beer']['price'] }} -
                            Quantity {{ $beer['quantity'] }} -
                            <a href="{{ route('user.cart.increment', ['id' => $beer['beer']['id']]) }}">Add</a> -
                            <a href="{{ route('user.cart.decrement', ['id' => $beer['beer']['id']]) }}">Substract</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

        <form method="POST" action="{{ route('user.orders.save') }}">
            @csrf
            <p class="form-control mb-2">
                <label for="cars">{{ __('billing.payment-method') }}</label>
                <select name="paymentMethod">
                    <option value="CREDIT_CARD">{{ __('billing.payment-method.credit-card') }}</option>
                    <option value="CASH">{{ __('billing.payment-method.cash') }}</option>
                    <option value="PSE">{{ __('billing.payment-method.pse') }}</option>
                </select>
            </p>
            <input type="text" class="form-control mb-2" placeholder={{ __('billing.department') }} name="department"
                value="{{ old('department') }}" />
            <input type="text" class="form-control mb-2" placeholder={{ __('billing.city') }} name="city"
                value="{{ old('city') }}" />
            <input type="text" class="form-control mb-2" placeholder={{ __('billing.address') }} name="address"
                value="{{ old('address') }}" />
            <input type="submit" class="btn btn-primary" value="Send" />
        </form>
    </div>

    <div><a href="{{ route('user.cart.removeAll') }}">Remove all beers from cart</a></div>
@endsection
