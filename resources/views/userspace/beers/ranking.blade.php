@extends('userspace.layouts.app')
@section('title', __('beers.ranking.title'))
@section('content')
    <div class="card-grid row  align-items-center">
        <form method="GET" action="{{ route('user.beers.ranking') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="ranking_param" class="form-control">
                        <option value="score" {{ $viewData['ranking_param'] ?? '' == 'price' ? 'selected' : '' }}>
                            {{ __('beers.ranking.score') }}</option>
                        <option value="sold" {{ $viewData['ranking_param'] ?? '' == 'sold' ? 'selected' : '' }}>
                            {{ __('beers.ranking.sold') }}</option>
                    </select>
                    @error('ranking_param')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row text-center d-flex justify-content-center mb-5">
                <div class="col-md-4 text-center">
                    <button type="submit" class="btn btn-primary beer-card__btn beer-card__btn--block">
                        {{ __('beers.ranking.button') }}
                    </button>
                </div>
            </div>
        </form>

        @forelse ($viewData["beers"] as $beer)
            <div class="col-lg-3 col-md-3 mb-2">
                <p style="font-size: 20em;">{{ $loop->index + 1 }}</p>
            </div>
            <div class="col-lg-8 col-md-8 mb-2">
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
                        <p style="text-align: center"> {{ $beer->getRating() }}</p>
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
                                    class="d-inline-blox p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-danger beer-card__btn--block">
                                        {{ __('cart.remove.button') }}
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('user.cart.add', ['id' => $beer->getId()]) }}"
                                    class="d-inline-blox p-0">
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
