@extends('userspace.layouts.app')
@section('title', __('beers.title'))
@section('content')
    @if (session('cart-delete'))
        <div class="alert alert-warning">
            {{ session('cart-delete') }}
        </div>
    @endif
    <div class="row card-grid">
        @forelse ($viewData["beers"] as $beer)
            <div class="col-md-4 mb-2">
                <div class="card flex-row">
                    <div class="align-self-center mh-25 w-25">
                        <img src="{{ $beer->getURL() }}" class="card-img-top img-card">
                    </div>
                    <div class="card-body align-items-center">
                        <p class="h4 fw-bold">{{ $beer->getName() }}</p>
                        <p>
                            {{ $beer->getIngredient() }}
                            <i>From {{ $beer->getOrigin() }}</i>
                        </p>
                        <p>{{ $beer->getFormat() }}</p>
                        <p><strong class="h5 fw-bold">{{ $beer->getPrice() . ' ' . __('beers.currency') }}</strong>
                        </p>
                        <a class="btn btn-primary" href="{{ route('user.beers.show', ['id' => $beer->getId()]) }}">
                            Add to cart
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
