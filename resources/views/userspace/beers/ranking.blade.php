@extends('userspace.layouts.app')
@section('title', __('beers.ranking.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.ranking')) }}
@endsection

@section('content')
    <div class="card-grid row align-items-center">
        @forelse ($viewData["beers"] as $beer)
            <x-userspace.ranking-card
                :index="$loop->index + 1"
                :beer="$beer"
                :beersInCart="$viewData['beersInCart']">

            </x-userspace.ranking-card>
        @empty
            <div class="row justify-content-center align-items-center">
                <div class="col py-5">
                    <p class="fw-bold text-center">{{ __('messages.no-data') }}</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
