@extends('userspace.layouts.app')
@section('title')
    Welcome
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.home')) }}
@endsection

@section('content')
    {{ __('messages.store.description') }}
    <div class="w-100 mb-5">
        <img class="w-100" src="https://thebogotapost.com/wp-content/uploads/2020/10/Chelarte.jpg" alt="main-photo">
    </div>
@endsection
