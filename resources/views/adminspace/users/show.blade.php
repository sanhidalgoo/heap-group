@extends('adminspace.layouts.app')
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 align-items-center">
            <img src="https://happytravel.viajes/wp-content/uploads/2020/04/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body px-5">
                <div class="row mb-4 align-items-end">
                    <h5 class="card-title col-md-6">
                        {{ $viewData["user"]->getName() }}
                    </h5>
                    <div class="row col-md-6 g-2">
                        <div class="col-md-6">
                            <a class="btn btn-primary w-100" href="{{ route('admin.users.edit', ['id'=> $viewData['user']->getId()]) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('users.index.edit') }}
                            </a>
                        </div>
                        <form class="d-inline-block col-md-6" method="POST" action="{{ route('admin.users.delete', ['id' => $viewData['user']->getId()]) }}">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger w-100">
                                <i class="fa-solid fa-trash-can"></i>
                                {{ __('users.index.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <p class="card-text col-md-6"><strong>{{ __('users.name') }}: </strong>{{ $viewData["user"]->getName() }}</p>
                    <p class="card-text col-md-6"><strong>{{ __('users.email') }}: </strong>{{ $viewData["user"]->getEmail() }}</p>
                    <p class="card-text col-md-4"><strong>{{ __('users.birthdate') }}: </strong>{{ $viewData["user"]->getBirthdate() }}</p>
                    <p class="card-text col-md-4"><strong>{{ __('users.cash-available') }}: </strong>{{ $viewData["user"]->getCashAvailable() }}</p>
                    <p class="card-text col-md-4"><strong>{{ __('users.role') }}: </strong>{{ $viewData["user"]->getRole() }}</p>
                    <p class="card-text col-md-12"><strong>{{ __('users.address') }}: </strong>{{ $viewData["user"]->getAddress() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
