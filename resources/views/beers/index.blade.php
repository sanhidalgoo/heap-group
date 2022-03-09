@extends('layouts.app')
@section('subtitle', __('beers.title'))
@section('content')
@if(session('delete'))
    <div class="alert alert-warning">
        {{ session('delete') }}
    </div>
@endif
<div class="row card-grid">
    @forelse ($viewData["beers"]->reverse() as $beer)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <div class="card-image-container">
                <img src="{{ $beer->getURL() }}" class="card-img-top img-card">
            </div>
            <div class="card-body text-center align-items-center">
                <p>ref: <span class="id-detail">{{ $beer->getId() }}</span></p>
                <p class="h2">{{ $beer->getName() }}</p>
                <p><strong>{{__('beers.cost') . ': '. $beer->getPrice() . ' ' . __('beers.currency') }}</strong></p>
                <a href="{{ route('beers.show', ['id'=> $beer->getId()]) }}" class="col-md-6 btn bg-primary text-white">
                    Ver más
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
