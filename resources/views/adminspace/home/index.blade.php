@extends('adminspace.layouts.app')
@section('content')
<div class="row card-grid">
    @foreach($viewData["options"] as $option)
        <div class="d-flex flex-column align-items-center col-md-4 col-lg-3 m-2 py-3 border">
            <p class="h2 mb-4">{{ $option["title"] }}</p>
            <a class="col-md-8 btn bg-primary text-white mb-2" href="{{ $option['create-route'] }}">{{ $option["create"] }}</a>
            <a class="col-md-8 btn bg-primary text-white mb-2" href="{{ $option['index-route'] }}">{{ $option["index"] }}</a>
        </div>
    @endforeach
</div>
@endsection
