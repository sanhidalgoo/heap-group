@extends('layouts.app')
@section('subtitle', __('cart.title'))
@section('content')
    @if (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-warning">
            {{ session('delete') }}
        </div>
    @endif
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Available beers</h1>
                <ul>
                    @foreach ($viewData['beers'] as $key => $beer)
                        <li>
                            Id: {{ $beer->getId() }} -
                            Name: {{ $beer->getName() }} -
                            Price: {{ $beer->getPrice() }} -
                            <a href="{{ route('cart.add', ['id' => $beer->getId()]) }}">Add to cart</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <a href="{{ route('user.cart.bill') }}">Comprar</a>

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
                            
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>


        <form method="POST" action="{{ route('user.cart.purchase') }}">
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

    <div><a href="{{ route('cart.removeAll') }}">Remove all beers from cart</a></div>
