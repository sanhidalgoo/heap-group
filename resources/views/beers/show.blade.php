@extends('layouts.app')
@section('subtitle', $viewData["beer"]->getName())
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 align-items-center">
            <img src="{{ $viewData["beer"]->getURL() }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body px-5">
                <div class="row mb-4 align-items-end">
                    <h5 class="card-title col-9">
                        {{ $viewData["beer"]->getName() }}
                    </h5>
                    <form method="POST" action="{{ route('beers.delete', ['id'=> $viewData["beer"]->getId()]) }}" class="col-3">
                        @csrf
                        <button class="btn bg-danger text-white" type="submit">{{ __('beers.delete.button') }}</button>
                    </form>
                </div>
                <div class="row">
                    <p class="card-text col"><strong>{{ __('beers.brand') }}: </strong>{{ $viewData["beer"]->getBrand() }}</p>
                    <p class="card-text col"><strong>{{ __('beers.ingredient') }}: </strong>{{ $viewData["beer"]->getIngredient() }}</p>
                    <p class="card-text col"><strong>{{ __('beers.flavor') }}: </strong>{{ $viewData["beer"]->getFlavor() }}</p>
                </div>
                <p class="card-text col"><strong>{{ __('beers.details') }}: </strong>{{ $viewData["beer"]->getDetails() }}</p>
                <div class="row">
                    <p class="card-text col"><strong>{{ __('beers.abv') }}: </strong>{{ $viewData["beer"]->getAbv() }} %</p>
                    <p class="card-text col"><strong>{{ __('beers.format') }}: </strong>{{ $viewData["beer"]->getFormat() }}</p>
                    <p class="card-text col"><strong>{{ __('beers.origin') }}: </strong>{{ $viewData["beer"]->getOrigin() }}</p>
                </div>
                <p class="card-text"><strong>{{ __('beers.quantity') }}:  </strong>{{ $viewData["beer"]->getQuantity() }}</p>
                <p class="card-text"><strong>{{ __('beers.cost') }}: {{ $viewData["beer"]->getPrice() . ' ' . __('beers.currency') }}</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection
