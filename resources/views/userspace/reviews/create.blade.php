@extends('userspace.layouts.app')
@section('subtitle', __('users.create.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.reviews.create'), $viewData['beer']) }}
@endsection


@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-5 shadow-md">
            <x-typography.subtitle>{{ __('reviews.add.description') }}</x-typography.subtitle>
            <form method="POST" action="{{ route('user.reviews.save',  ['id'=> $viewData['beer']->getId()]) }}">
                @csrf
                <div class="flex-grow">
                    <label for="score" class="block mb-2 text-md font-medium text-gray-900">
                        {{ __('reviews.score') }}
                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="score"
                        value="{{ old('score') }}"
                    >
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>
                <label for="comment" class="block my-6 mb-2 text-md font-medium text-gray-900">
                    {{ __('reviews.comment') }}
                </label>
                <textarea
                    class="mb-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 h-40 p-2.5"
                    name="comment"
                    required
                    value="{{ old('comment') }}"
                ></textarea>
                <x-userspace.button render="button type=submit">
                    {{ __('reviews.submit.button') }}
                </x-userspace.button>
            </form>
        </div>
    </div>
</div>
@endsection
