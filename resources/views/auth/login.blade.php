@extends('userspace.layouts.app')
@section('title', __('auth.login'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <x-userspace.input
                            label="{{ __('auth.email') }}"
                            type="email"
                            name="email"
                            autocomplete="email"
                            autofocus
                            required
                            errorClass="{{ $errors->has('email') ? 'ring-red-700 border-red-700' : '' }}"
                            :value="old('email')"
                        />
                        <x-userspace.input
                            label="{{ __('auth.password') }}"
                            type="password"
                            name="password"
                            autocomplete="password"
                            autofocus
                            required
                            errorClass="{{ $errors->has('password') ? 'ring-red-700 border-red-700' : '' }}"
                        />

                        <x-userspace.button color="primary solid" render="button type=submit">
                            {{ __('auth.login') }}
                        </x-userspace.button>

                        @if (Route::has('password.request'))
                            <div class="mt-6 transition hover:transition row text-center hover:font-bold">
                                <a href="{{ route('password.request') }}">
                                    {{ __('auth.password.forgot') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
