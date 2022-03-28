@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.email.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.email.verify.description') }}
                        </div>
                    @endif

                    {{ __('auth.email.verify.check') }}
                    {{ __('auth.email.verify.not-receive') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('email.verify.not-receive.button') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
