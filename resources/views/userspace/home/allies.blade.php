@extends('userspace.layouts.app')
@section('title')
    {{ __('messages.allies')}}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.allies')) }}
@endsection

@section('content')
<div class="bg-white shadow-md p-5">
    <div>
        <div class="flex flex-wrap -mx-2">
            @foreach ($viewData["computers"] as $computer)
                <div class="w-1/2 px-2">
                    <div class="m-4 bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $computer["name"] }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $computer["price"] . " USD" }}
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $computer["cpu"] }}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $computer["ram"] }} GB RAM</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $computer["storage"] }} GB</span>
                            @foreach($computer["Categories"] as $categories)
                                <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-blue-700 mr-2">{{ $categories }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
