@extends('layouts.navbar')
@section('logo')
    @include('adminspace.components.logo')
@endsection
@section('links')
    <a class="nav-link px-3" href="{{ route('admin.home.index') }}">{{ __('navigation.back') }}</a>
@endsection
