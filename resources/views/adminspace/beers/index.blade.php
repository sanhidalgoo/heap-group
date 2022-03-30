@extends('adminspace.layouts.app')
@section('subtitle', __('beers.title'))
@section('content')
@if(session('update'))
    <div class="alert alert-info">
        {{ session('update') }}
    </div>
@endif
@if(session('delete'))
    <div class="alert alert-warning">
        {{ session('delete') }}
    </div>
@endif
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.beers.create') }}" class="btn btn-success btn-block">
        <i class="fa-solid fa-plus"></i>
        {{ __('beers.index.add') }}
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">{{ __('beers.index.col.id') }}</th>
            <th class="text-center" scope="col">{{ __('beers.index.col.name') }}</th>
            <th class="text-center" scope="col">{{ __('beers.index.col.ingredient') }}</th>
            <th class="text-center" scope="col">{{ __('beers.index.col.format') }}</th>
            <th class="text-center" scope="col">{{ __('beers.index.col.price') }}</th>
            <th class="text-center" scope="col">{{ __('beers.index.col.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($viewData["beers"] as $beer)
        <tr>
            <th scope="row">{{ $beer->getId() }}</th>
            <td>{{ $beer->getName() }}</td>
            <td>{{ $beer->getIngredient() }}</td>
            <td>{{ $beer->getFormat() }}</td>
            <td>{{ $beer->getPrice() }}</td>
            <td class="text-center">
                <a href="{{ route('admin.beers.show', ['id'=> $beer->getId()]) }}" class="btn btn-success">
                    <i class="fa-solid fa-circle-info"></i>
                    {{ __('beers.index.details') }}
                </a>
                <a href="{{ route('admin.beers.edit', ['id'=> $beer->getId()]) }}" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    {{ __('beers.index.edit') }}
                </a>
                <form method="POST" action="{{ route('admin.beers.delete', ['id' => $beer->getId()]) }}" class="d-inline-block p-0">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                        {{ __('beers.index.delete') }}
                    </button>
                </form>
            </td>
            </th>
        </tr>
        @empty
        <tr>
            <td colspan="6">
                <p class="fw-bold text-center">{{ __('messages.no-data') }}</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
