@extends('userspace.layouts.app')
@section('subtitle', $viewData['subtitle'])
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
                                {{ $viewData['reviews']->count() }} reviews
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
                        <a class="btn btn-primary beer-card__btn beer-card__btn--block" href="#">
                            Add to cart
                        </a>
                        <a class="btn btn-danger beer-card__btn--block" href="#">
                            Remove from cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p class="card-text col">
                    <strong>{{ __('beers.details') }}</strong>
                    <br/>
                    {{ $viewData['beer']->getDetails() }}
                </p>

                @if(!$viewData['reviews']->isEmpty())
                <div class="card-body px-5">
                    <div class="d-flex flex-column justify-content-center text-center my-4">
                        <h2 class="h2-title">
                            Reviews
                        </h2>
                        @foreach($viewData['reviews'] as $review)
                            <div class="card-text">
                                <strong>{{ $review->user()->get() }}</strong>
                                <br/>
                                {{ $review->getComment() }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
