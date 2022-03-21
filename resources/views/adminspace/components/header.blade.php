@extends('layouts.navbar')
@section('logo')
    @include('adminspace.components.logo')
@endsection
@section('links')
    <a class="nav-link px-3 {{ request()->routeIs('admin.home.index') ? 'active' : '' }}" href="{{ route('admin.home.index') }}">{{ __('navigation.home') }}</a>
    <a class="nav-link px-3 {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">{{ __('navigation.users') }}</a>
    <a class="nav-link px-3 {{ request()->routeIs('admin.beers.index') ? 'active' : '' }}" href="{{ route('admin.beers.index') }}">{{ __('navigation.beers') }}</a>
@endsection
