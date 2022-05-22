@extends('userspace.layouts.app')
@section('title')
    {{ __('messages.welcome')}}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.home')) }}
@endsection

@section('content')
    <x-userspace.pokemon-banner :pokemon="$viewData['pokemon']">
    </x-userspace.pokemon-banner>
    <div class="w-100 mb-5">
        <img class="w-100" src="https://thebogotapost.com/wp-content/uploads/2020/10/Chelarte.jpg" alt="main-photo">
    </div>
@endsection
