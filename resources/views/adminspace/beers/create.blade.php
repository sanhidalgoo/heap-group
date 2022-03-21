@extends('adminspace.layouts.app')
@section('subtitle', __('beers.create.title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('beers.create.description') }}</div>
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

                    <form method="POST" action="{{ route('admin.beers.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('beers.name') }}" name="name" value="{{ old('name') }}" />
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.brand') }}" name="brand" value="{{ old('brand') }}" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.origin') }}" name="origin" value="{{ old('origin') }}" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.ingredient') }}" name="ingredient" value="{{ old('ingredient') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.flavor') }}" name="flavor" value="{{ old('flavor') }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.format') }}" name="format" value="{{ old('format') }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.abv') }}" name="abv" value="{{ old('abv') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.price') }}" name="price" value="{{ old('price') }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.quantity') }}" name="quantity_available" value="{{ old('quantity_available') }}" />
                            </div>
                        </div>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('beers.image-url') }}" name="image_url" value="{{ old('image_url') }}" />
                        <textarea type="text" class="form-control mb-2 h-25" placeholder="{{ __('beers.details') }}" name="details" value="{{ old('details') }}"></textarea>
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
