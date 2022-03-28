@extends('userspace.layouts.app')
@section('title', __('beers.title'))
@section('content')
    @if (session('cart-delete'))
        <div class="alert alert-warning">
            {{ session('cart-delete') }}
        </div>
    @endif
    <div class="row card-grid">
        <div>
            <form method="GET" action="{{ route('user.beers.index') }}">
                @csrf

                <div class="row mb-3">
                    <label for="minPrice" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="minPrice" type="text" class="form-control @error('minPrice') is-invalid @enderror"
                            name="minPrice" value="{{ $viewData['minPrice'] ?? '' }}" autofocus>

                        @error('minPrice')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary beer-card__btn beer-card__btn--block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
                            Details
                        </a>
                        <a class="btn btn-primary beer-card__btn beer-card__btn--block" href="#">
                            Add to cart
                        </a>
                        <a class="btn btn-danger beer-card__btn--block" href="#">
                            Remove from cart
                        </a>
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
