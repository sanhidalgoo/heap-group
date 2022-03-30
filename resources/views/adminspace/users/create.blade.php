@extends('adminspace.layouts.app')
@section('subtitle', __('users.create.title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('users.create.description') }}</div>
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

                    <form method="POST" action="{{ route('admin.users.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.name') }}" name="name" value="{{ old('name') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.email') }}" name="email" value="{{ old('email') }}" />
                        <input type="password" class="form-control mb-2" placeholder="{{ __('users.password') }}" name="password" value="" />
                        <input type="password" class="form-control mb-2" placeholder="{{ __('users.password-confirmation') }}" name="password_confirmation" value="" />
                        <input type="date" class="form-control mb-2" placeholder="{{ __('users.birthdate') }}" name="birthdate" value="{{ old('birthdate') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('users.address') }}" name="address" value="{{ old('address') }}" />
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-2" placeholder="{{ __('users.role') }}" name="role" value="{{ old('role') }}">
                                    <option value="User">{{ __('users.role.user') }}</option>
                                    <option value="Admin">{{ __('users.role.admin') }}</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control mb-2" placeholder="{{ __('users.cash-available') }}" name="cash_available" value="{{ old('cash_available') }}" />
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
