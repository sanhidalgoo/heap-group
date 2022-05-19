@extends('userspace.layouts.app')
@section('title', __('auth.register'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <x-userspace.input
                            label="{{ __('auth.register.name') }}"
                            type="text"
                            name="name"
                            autocomplete="name"
                            autofocus
                            required
                            errorClass="{{ $errors->has('name') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('name')"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.email') }}"
                            type="email"
                            name="email"
                            autocomplete="email"
                            autofocus
                            required
                            errorClass="{{ $errors->has('email') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('email')"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.password') }}"
                            type="password"
                            name="password"
                            autocomplete="password"
                            autofocus
                            required
                            errorClass="{{ $errors->has('password') ? 'ring-red-700 border-red-700' : '' }}"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.password.confirm') }}"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            autofocus
                            required
                            errorClass="{{ $errors->has('password_confirmation') ? 'ring-red-700 border-red-700' : '' }}"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.birthdate') }}"
                            type="date"
                            name="birthdate"
                            autocomplete="birthdate"
                            autofocus
                            required
                            errorClass="{{ $errors->has('birthdate') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('birthdate')"
                            extraProps="max={{ now()->subYears(18)->format('Y-m-d') }}"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.address') }}"
                            type="text"
                            name="address"
                            autocomplete="address"
                            autofocus
                            required
                            errorClass="{{ $errors->has('address') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('address')"
                        />
                        <x-userspace.input
                            label="{{ __('auth.register.cash-available') }}"
                            type="number"
                            name="cash_available"
                            autocomplete="cash_available"
                            autofocus
                            required
                            errorClass="{{ $errors->has('cash_available') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('cash_available')"
                        />

                        <x-userspace.button color="primary solid" render="button type=submit">
                            {{ __('auth.register.button') }}
                        </x-userspace.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
