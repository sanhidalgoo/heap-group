@extends('adminspace.layouts.app')
@section('subtitle', __('users.title'))
@section('content')
@if(session('delete'))
    <div class="alert alert-warning">
        {{ session('delete') }}
    </div>
@endif
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-block">
        <i class="fa-solid fa-plus"></i>
        Add a new user
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Created at</th>
            <th class="text-center" scope="col">Actions</th>
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
                    Details
                </a>
                <a href="{{ route('admin.users.edit', ['id'=> $user->getId()]) }}" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.users.delete', ['id' => $user->getId()]) }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                        Delete
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
