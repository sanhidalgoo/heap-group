@extends('layouts.navbar')
@section('logo')
    <a class="navbar-brand fw-bold" href="{{ route('admin.home.index') }}">{{ __('messages.title') }} ADMIN</a>
@endsection
@section('links')
    <a class="nav-link px-3 {{ request()->routeIs('admin.home.index') ? 'active' : '' }}"
        href="{{ route('admin.home.index') }}">{{ __('navigation.home') }}</a>
    <a class="nav-link px-3 {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
        href="{{ route('admin.users.index') }}">{{ __('navigation.users') }}</a>
    <a class="nav-link px-3 {{ request()->routeIs('admin.beers.index') ? 'active' : '' }}"
        href="{{ route('admin.beers.index') }}">{{ __('navigation.beers') }}</a>
@endsection
