@extends('userspace.layouts.app')
@section('subtitle', __('users.create.title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('reviews.add.description') }}</div>
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

                    <form method="POST" action="{{ route('user.reviews.save',  ['id'=> $viewData['beerId']]) }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="cars">{{ __('reviews.score') }}</label>
                                <select class="form-select mb-2" name="score" value="{{ old('score') }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <textarea class="form-control mb-2" placeholder="{{ __('reviews.comment') }}" name="comment" value="{{ old('comment') }}"></textarea>
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection