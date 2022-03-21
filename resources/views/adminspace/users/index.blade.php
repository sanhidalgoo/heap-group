@extends('adminspace.layouts.app')
@section('subtitle', __('users.title'))
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
    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-block">
        <i class="fa-solid fa-plus"></i>
        {{ __('users.index.add') }}
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">{{ __('users.index.col.id') }}</th>
            <th class="text-center" scope="col">{{ __('users.index.col.email') }}</th>
            <th class="text-center" scope="col">{{ __('users.index.col.created-at') }}</th>
            <th class="text-center" scope="col">{{ __('users.index.col.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($viewData["users"] as $user)
        <tr>
            <th scope="row">{{ $user->getId() }}</th>
            <td>{{ $user->getEmail() }}</td>
            <td>{{ $user->getCreatedAt() }}</td>
            <td class="text-center">
                <a href="{{ route('admin.users.show', ['id'=> $user->getId()]) }}" class="btn btn-success">
                    <i class="fa-solid fa-circle-info"></i>
                    {{ __('users.index.details') }}
                </a>
                <a href="{{ route('admin.users.edit', ['id'=> $user->getId()]) }}" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    {{ __('beers.index.edit') }}
                </a>
                <form method="POST" action="{{ route('admin.users.delete', ['id' => $user->getId()]) }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                        {{ __('beers.index.delete') }}
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <p class="fw-bold text-center">{{ __('messages.no-data') }}</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
