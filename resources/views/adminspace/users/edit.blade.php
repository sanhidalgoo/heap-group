@extends('adminspace.layouts.app')
@section('subtitle', __('users.edit.title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('users.edit.description') }}</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.users.update', ['id' => $viewData['user']->getId()]) }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.name') }}" name="name" value="{{ $viewData['user']->getName() }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.email') }}" name="email" value="{{ $viewData['user']->getEmail() }}" />
                        <input type="date" class="form-control mb-2" placeholder="{{ __('users.birthdate') }}" name="birthdate" value="{{ $viewData['user']->getBirthdate() }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.address') }}" name="address" value="{{ $viewData['user']->getAddress() }}" />
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-2" placeholder="{{ __('users.role') }}" name="role" value="{{ $viewData['user']->getRole() }}">
                                    <option>User</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control mb-2" placeholder="{{ __('users.cash-available') }}" name="cash_available" value="{{ $viewData['user']->getCashAvailable() }}" />
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
