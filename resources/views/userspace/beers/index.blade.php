@extends('userspace.layouts.app')
@section('title', __('beers.title'))
@section('content')
    <div id="filterbox-open" class="text-center px-3 py-1 bg-[#604028] hover:bg-[#2b1e14] text-white transition">
        <i class="fa-solid fa-filter"></i>
    </div>
    <div class="relative grid grid-cols-3 gap-4">
        <div id="filterbox" class="hidden fixed left-0 right-0 ml-auto mr-auto w-[500px]">
            <a id="filterbox-close" class="fixed bg-[#5e472bf0] top-0 left-0 w-full h-full z-[-1] transition duration-150 ease-in">
            </a>
            <form method="GET" action="{{ route('user.beers.index') }}">
                <div class="row mb-3">
                    <div class="rounded p-5 bg-white">
                        <div class="text-center">
                            <x-typography.title>
                                {{ __('beers.filter.title') }}
                            </x-typography.title>
                        </div>
                        <div class="price-input flex my-8 w-full items-center">
                            <label class="mx-3 min-w-max flex-grow">{{ __('beers.filter.min') }}</label>
                            <input
                                class="input-min flex-grow shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="price_min"
                                name="price_min"
                                type="number"
                                value="{{ $viewData['price_min'] ?? 0 }}"
                            >
                            <label class="mx-3 min-w-max flex-grow">{{ __('beers.filter.max') }}</label>
                            <input
                                class="input-max flex-grow shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="price_max"
                                name="price_max"
                                type="number"
                                value="{{ $viewData['price_max'] ?? 7500 }}"
                            >
                        </div>
                        <div class="slider">
                            <div class="progress" min="{{ $viewData['price_min'] ?? 0 }}" max="{{ $viewData['price_max'] ?? 7500 }}"></div>
                        </div>
                        <div class="range-input relative">
                            <input type="range" class="range-min" min="0" max="10000" value="{{ $viewData['price_min'] ?? 0 }}" step="100">
                            <input type="range" class="range-max" min="0" max="10000" value="{{ $viewData['price_max'] ?? 7500 }}" step="100">
                        </div>
                    </div>
                    <x-userspace.submit-button route="user.beers.index">
                        {{ __('beers.filter.apply') }}
                    </x-userspace.submit-button>
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
                            {{ __('beers.details') }}
                        </a>
                        @auth
                            @if (array_key_exists($beer->getId(), $viewData['beersInCart']))
                                <form method="POST" action="{{ route('user.cart.remove', ['id' => $beer->getId()]) }}"
                                    class="btn btn-danger beer-card__btn--block p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-danger beer-card__btn--block">
                                        {{ __('cart.remove.button') }}
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('user.cart.add', ['id' => $beer->getId()]) }}"
                                    class="btn btn-primary beer-card__btn beer-card__btn--block p-0">
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
