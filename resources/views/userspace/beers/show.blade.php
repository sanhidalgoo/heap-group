@extends('userspace.layouts.app')
@section('title', $viewData['subtitle'])
@section('content')
    <div class="card mb-3 px-5 py-2">
        <div class="row g-0">
            <div class="col-md-4 align-items-center">
                <img src="{{ $viewData['beer']->getURL() }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body px-5">
                    <div class="d-flex flex-column justify-content-center text-center mb-2">
                        <h3 class="card-title">
                            {{ $viewData['beer']->getName() }}
                        </h3>
                        <div class="d-flex justify-content-center mb-2">
                            <div class="mr-2 rating">
                                <span class="fa fa-star {{ $viewData['beer']->getRating() >= 0.5 ? 'checked' : '' }}"></span>
                                <span class="fa fa-star {{ $viewData['beer']->getRating() >= 1.5 ? 'checked' : '' }}"></span>
                                <span class="fa fa-star {{ $viewData['beer']->getRating() >= 2.5 ? 'checked' : '' }}"></span>
                                <span class="fa fa-star {{ $viewData['beer']->getRating() >= 3.5 ? 'checked' : '' }}"></span>
                                <span class="fa fa-star {{ $viewData['beer']->getRating() >= 4.5 ? 'checked' : '' }}"></span>
                            </div>
                            <div class="total-reviews">
                                {{ $viewData['reviews']->count() . ' ' . __('beers.reviews') }}
                            </div>
                        </div>
                    </div>
                    <div class="beer-container__feature">
                        <div class="row">
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.brand') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getBrand() }}
                            </p>
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.ingredient') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getIngredient() }}
                            </p>
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.flavor') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getFlavor() }}
                            </p>
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.abv') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getAbvPercentage() }} %
                            </p>
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.format') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getFormat() }}
                            </p>
                            <p class="card-text col-6 m-0">
                                <strong>{{ __('beers.origin') }}</strong>
                                <br/>
                                {{ $viewData['beer']->getOrigin() }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center text-center my-4">
                        <h4 class="card-text mb-2">
                            <strong>{{ $viewData['beer']->getPrice() . ' ' . __('beers.currency') }}</strong>
                        </h4>
                        <p class="card-text">
                            <strong>{{ __('beers.quantity') }}: </strong>
                            {{ $viewData['beer']->getQuantity() }}
                        </p>
                        @auth
                            @if(array_key_exists($beer->getId(), $viewData['beersInCart']))
                                <a class="btn btn-danger beer-card__btn--block" href="{{ route('user.cart.remove', ['id' => $beer->getId()]) }}">
                                    {{ __('cart.remove.button') }}
                                </a>
                            @else
                                <a class="btn btn-primary beer-card__btn beer-card__btn--block" href="{{ route('user.cart.add', ['id' => $beer->getId()]) }}">
                                    {{ __('cart.add.button') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p class="card-text col">
                    <strong>{{ __('beers.details') }}</strong>
                    <br/>
                    {{ $viewData['beer']->getDetails() }}
                </p>

                <div class="d-flex flex-column justify-content-center text-center">
                    @if(!$viewData['reviews']->isEmpty())
                    <h2 class="h2-title">
                        Reviews
                    </h2>
                    @foreach($viewData['reviews'] as $review)
                        <div class="row review-card">
                            <div class="col-md-2 review-card__aside">
                                <div class="review-card__img-wrapper"></div>
                            </div>
                            <div class="col-md-10 review-card__body">
                                <div class="review-card__header">
                                    <div>
                                        <p class="review-card__info m-0">Published by username, one year ago</p>
                                        <div class="d-flex">
                                            <div class="mr-2 rating">
                                                <span class="fa fa-star {{ $review->getScore() >= 0.5 ? 'checked' : '' }}"></span>
                                                <span class="fa fa-star {{ $review->getScore() >= 1.5 ? 'checked' : '' }}"></span>
                                                <span class="fa fa-star {{ $review->getScore() >= 2.5 ? 'checked' : '' }}"></span>
                                                <span class="fa fa-star {{ $review->getScore() >= 3.5 ? 'checked' : '' }}"></span>
                                                <span class="fa fa-star {{ $review->getScore() >= 4.5 ? 'checked' : '' }}"></span>
                                            </div>
                                            <div class="total-reviews">
                                                {{ $review->getScore() }} / 5 {{ __('beers.score') }}
                                            </div>
                                        </div>
                                    </div>
                                    @auth
                                        @if($review->getUserId() == Auth::user()->getId())
                                        <form class="d-inline-block col-md-1" method="POST" action="{{ route('user.review.delete', ['id' => $review->getId()]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-block btn-danger w-100">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                        @endif
                                    @endauth
                                </div>
                                {{ $review->getComment() }}
                                {{ $review->getComment() }}
                                {{ $review->getComment() }}
                            </div>
                        </div>
                    @endforeach
                    @endif
                    @auth
                        <div class="row review-card border-3 border-success">
                            <a href="#" class="text-decoration-none text-success">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div class="btn btn-success rounded-circle">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <h3 class="d-inline-block mx-3 my-0 fw-bold">{{ __('beers.reviews.add') }}</h3>
                                </div>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
