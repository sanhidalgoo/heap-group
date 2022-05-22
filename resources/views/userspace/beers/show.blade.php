@extends('userspace.layouts.app')
@section('title', $viewData['subtitle'])
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.beers') . '.show', $viewData['beer']) }}
@endsection

@section('content')
    <div class="mb-3 px-5 py-2">
        <div class="flex flex-row bg-white px-5 shadow-md">
            <div class="flex-grow p-5">
                <img class="my-0 mx-auto w-40" src="{{ $viewData['beer']->getURL() }}">
            </div>
            <div class="flex-grow p-5">
                <div class="">
                    <div class="flex flex-col justify-start text-center mb-2">
                        <h3 class="font-bold text-2xl mb-4">
                            {{ $viewData['beer']->getName() }}
                        </h3>
                        <div class="flex flex-col justify-center mb-2">
                            <div class="text-amber-500">
                                <span
                                    class="ratingStar fa fa-star {{ $viewData['beer']->getRating() >= 0.5 ? 'checked' : '' }}"></span>
                                <span
                                    class="ratingStar fa fa-star {{ $viewData['beer']->getRating() >= 1.5 ? 'checked' : '' }}"></span>
                                <span
                                    class="ratingStar fa fa-star {{ $viewData['beer']->getRating() >= 2.5 ? 'checked' : '' }}"></span>
                                <span
                                    class="ratingStar fa fa-star {{ $viewData['beer']->getRating() >= 3.5 ? 'checked' : '' }}"></span>
                                <span
                                    class="ratingStar fa fa-star {{ $viewData['beer']->getRating() >= 4.5 ? 'checked' : '' }}"></span>
                                <span
                                    class="ml-2 text-black">{{ $viewData['reviews']->count() . ' ' . __('beers.reviews') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 text-center gap-2">
                        <p class="block">
                            <strong>{{ __('beers.brand') }}</strong>
                            <br />
                            {{ $viewData['beer']->getBrand() }}
                        </p>
                        <p class="block">
                            <strong>{{ __('beers.ingredient') }}</strong>
                            <br />
                            {{ $viewData['beer']->getIngredient() }}
                        </p>
                        <p class="card-text col-6 m-0">
                            <strong>{{ __('beers.flavor') }}</strong>
                            <br />
                            {{ $viewData['beer']->getFlavor() }}
                        </p>
                        <p class="card-text col-6 m-0">
                            <strong>{{ __('beers.abv') }}</strong>
                            <br />
                            {{ $viewData['beer']->getAbvPercentage() }} %
                        </p>
                        <p class="card-text col-6 m-0">
                            <strong>{{ __('beers.format') }}</strong>
                            <br />
                            {{ $viewData['beer']->getFormat() }}
                        </p>
                        <p class="card-text col-6 m-0">
                            <strong>{{ __('beers.origin') }}</strong>
                            <br />
                            {{ $viewData['beer']->getOrigin() }}
                        </p>
                    </div>
                    <div class="flex flex-col justify-center text-center my-4">
                        <h4 class="card-text mb-2">
                            <strong>{{ $viewData['beer']->getPrice() . ' ' . __('beers.currency') }}</strong>
                        </h4>
                        <p class="card-text mb-4">
                            <strong>{{ __('beers.quantity') }}: </strong>
                            {{ $viewData['beer']->getQuantity() }}
                        </p>
                        @auth
                            @if (array_key_exists($viewData['beer']->getId(), $viewData['beersInCart']))
                                <x-userspace.form-button color="danger solid" route="user.cart.remove" :params="['id' => $viewData['beer']->getId()]">
                                    {{ __('cart.remove.button') }}
                                </x-userspace.form-button>
                            @else
                                <x-userspace.form-button color="success solid" route="user.cart.add" :params="['id' => $viewData['beer']->getId()]">
                                    {{ __('cart.add.button') }}
                                </x-userspace.form-button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="block my-5">
            <p class="my-10">
                <strong class="text-lg">{{ __('beers.details') }}</strong>
                <br />
                {{ $viewData['beer']->getDetails() }}
            </p>

            <div class="d-flex flex-column justify-content-center text-center">
                @if (count($viewData['reviews']) > 0)
                    <x-typography.subtitle>
                        {{ __('reviews.title') }}
                    </x-typography.subtitle>
                    @foreach ($viewData['reviews'] as $review)
                        <div class="my-5 p-8 bg-white shadow-md">
                            <div class="mb-10 flex justify-around">
                                <div class="rounded-full overflow-hidden w-12 h-max">
                                    <img src="/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg">
                                </div>
                                <div class="text-sm">
                                    <p>
                                        {{ __('beers.review.published-by') }}
                                        {{ $review->user->getName() }}
                                    </p>
                                    <div class="flex flex-col justify-center mb-2">
                                        <div class="text-amber-500">
                                            <span
                                                class="fa fa-star {{ $viewData['beer']->getRating() >= 0.5 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ $viewData['beer']->getRating() >= 1.5 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ $viewData['beer']->getRating() >= 2.5 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ $viewData['beer']->getRating() >= 3.5 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ $viewData['beer']->getRating() >= 4.5 ? 'checked' : '' }}"></span>
                                            <span class="ml-2 text-black">{{ $review->getScore() }} / 5
                                                {{ __('beers.score') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-24">
                                    @auth
                                        @if ($review->user->getId() == Auth::user()->getId())
                                            <x-userspace.form-button color="danger solid" route="user.reviews.delete"
                                                :params="['id' => $review->getId()]">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </x-userspace.form-button>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div>
                                {{ $review->getComment() }}
                            </div>
                        </div>
                    @endforeach
                @endif
                @auth
                    <x-userspace.button color="success solid" route="user.reviews.create" :params="['id' => $viewData['beer']->getId()]">
                        <div class="flex justify-center text-xl">
                            <i class="fa-solid fa-plus my-1"></i>
                            <h3 class="d-inline-block mx-3 my-0 fw-bold">{{ __('beers.reviews.add') }}</h3>
                        </div>
                    </x-userspace.button>
                @endauth
            </div>
        </div>
    </div>
@endsection
