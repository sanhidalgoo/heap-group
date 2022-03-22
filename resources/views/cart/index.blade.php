@extends('layouts.app')
@section('subtitle', __('cart.title'))
@section('content')
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
                    @foreach ($viewData['beersInCart'] as $key => $beer)
                        <li>
                            Id: {{ $beer->getId() }} -
                            Name: {{ $beer->getName() }} -
                            Price: {{ $beer->getPrice() }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('cart.removeAll') }}">Remove all beers from cart</a>
            </div>
        </div>
    </div>
