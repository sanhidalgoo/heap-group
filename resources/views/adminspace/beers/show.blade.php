@extends('adminspace.layouts.app')
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 align-items-center">
            <img src="{{ $viewData["beer"]->getURL() }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body px-5">
                <div class="row mb-4 align-items-end">
                    <h5 class="card-title col-md-6">
                        {{ $viewData["beer"]->getName() }}
                    </h5>
                    <div class="row col-md-6 g-2">
                        <div class="col-md-6">
                            <a class="btn btn-primary w-100" href="{{ route('admin.beers.edit', ['id'=> $viewData['beer']->getId()]) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>
                        </div>
                        <form class="d-inline-block col-md-6" method="POST" action="{{ route('admin.beers.delete', ['id' => $viewData['beer']->getId()]) }}">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger w-100">
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <p class="card-text col"><strong>{{ __('beers.brand') }}: </strong>{{ $viewData["beer"]->getBrand() }}</p>
                    <p class="card-text col"><strong>{{ __('beers.ingredient') }}: </strong>{{ $viewData["beer"]->getIngredient() }}</p>
                    <p class="card-text col"><strong>{{ __('beers.flavor') }}: </strong>{{ $viewData["beer"]->getFlavor() }}</p>
                </div>
                <p class="card-text col"><strong>{{ __('beers.details') }}: </strong>{{ $viewData["beer"]->getDetails() }}</p>
                <div class="row">
                    <p class="card-text col"><strong>{{ __('beers.abv') }}: </strong>{{ $viewData["beer"]->getAbvPercentage() }} %</p>
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
