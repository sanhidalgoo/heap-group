@extends('adminspace.layouts.app')
@section('subtitle', __('beers.edit.title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('beers.edit.description') }}</div>
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

                    <form method="POST" action="{{ route('admin.beers.update', ['id' => $viewData['beer']->getId()]) }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('beers.name') }}" name="name" value="{{ $viewData['beer']->getName() }}" />
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.brand') }}" name="brand" value="{{ $viewData['beer']->getBrand() }}" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.origin') }}" name="origin" value="{{ $viewData['beer']->getOrigin() }}" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.ingredient') }}" name="ingredient" value="{{ $viewData['beer']->getIngredient() }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.flavor') }}" name="flavor" value="{{ $viewData['beer']->getFlavor() }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.format') }}" name="format" value="{{ $viewData['beer']->getFormat() }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.abv') }}" name="abv" value="{{ $viewData['beer']->getAbv() }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.price') }}" name="price" value="{{ $viewData['beer']->getPrice() }}" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="{{ __('beers.quantity') }}" name="quantity_available" value="{{ $viewData['beer']->getQuantity() }}" />
                            </div>
                        </div>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('beers.image-url') }}" name="image_url" value="{{ $viewData['beer']->getURL() }}" />
                        <textarea type="text" class="form-control mb-2 h-25" placeholder="{{ __('beers.details') }}" name="details">{{ $viewData['beer']->getDetails() }}</textarea>
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
