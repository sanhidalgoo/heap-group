@extends('userspace.layouts.app')
@section('title', __('beers.title'))
@section('content')
    <div class="row card-grid">
        @forelse ($viewData["beers"] as $beer)
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="beer-card">
                    <div class="beer-card__img-wrapper">
                        <img src="{{ $beer->getURL() }}" class="beer-card__img">
                    </div>
                    <div class="beer-card__body">
                        <p class="h4 fw-bold">{{ $beer->getName() }}</p>
                        <p>
                            {{ $beer->getIngredient() }}
                            <i>From {{ $beer->getOrigin() }}</i>
                        </p>
                        <p>{{ $beer->getFormat() }}</p>
                        <p><strong class="h5 fw-bold">{{ $beer->getPrice() . ' ' . __('beers.currency') }}</strong>
                        </p>
                        <div class="beer-card__rating">
                            <span class="fa fa-star {{ $beer->getRating() >= 0.5 ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ $beer->getRating() >= 1.5 ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ $beer->getRating() >= 2.5 ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ $beer->getRating() >= 3.5 ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ $beer->getRating() >= 4.5 ? 'checked' : '' }}"></span>
                        </div>

                        <a class="btn btn-success beer-card__btn--block mb-2"
                            href="{{ route('user.beers.show', ['id' => $beer->getId()]) }}">
                            {{ __('beers.details') }}
                        </a>
                        @auth
                            @if (array_key_exists($beer->getId(), $viewData['beersInCart']))
                                <form method="POST" action="{{ route('user.cart.remove', ['id' => $beer->getId()]) }}"
                                    class="btn btn-danger beer-card__btn--block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger beer-card__btn--block">
                                        {{ __('cart.remove.button') }}
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('user.cart.add', ['id' => $beer->getId()]) }}"
                                    class="btn btn-primary beer-card__btn beer-card__btn--block">
                                    @csrf
                                    <button type="submit" class="btn btn-primary beer-card__btn beer-card__btn--block">
                                        {{ __('cart.add.button') }}
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="row justify-content-center align-items-center">
                <div class="col py-5">
                    <p class="fw-bold text-center">{{ __('messages.no-data') }}</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
