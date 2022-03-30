@extends('userspace.layouts.app')
@section('title', __('orders.title'))
@section('content')
    <form method="GET" action="{{ route('user.orders.refund.save', ['id' => $viewData['orderId']]) }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="motive" class="col-md-2 col-form-label text-md-end">{{ __('orders.refund.motive') }}</label>
                <input id="motive" type="text" class="form-control @error('motive') is-invalid @enderror" name="motive"
                    value="{{ $viewData['motive'] ?? '' }}" autofocus>

                @error('motive')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row text-center d-flex justify-content-center mb-5">
                <div class="col-md-4 text-center">
                    <button type="submit" class="btn btn-primary beer-card__btn beer-card__btn--block">
                        {{ __('orders.refund.button') }}
                    </button>
                </div>
            </div>
    </form>
@endsection
