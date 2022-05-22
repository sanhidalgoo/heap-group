@extends('userspace.layouts.app')
@section('title', __('orders.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.orders')) }}
@endsection

@section('content')
    <table class="table bg-white rounded">
        <thead>
            <tr>
                <th class="border-r-4 p-2 text-center" scope="col">{{ __('orders.index.col.id') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('orders.index.col.total') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('orders.index.col.date') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('orders.index.col.status') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('orders.index.col.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($viewData["orders"] as $order)
                <tr>
                    <th class="border-r-4 py-4" scope="row">{{ $order->getId() }}</th>
                    <td class="px-2 text-center font-bold">{{ $order->getTotal() . ' ' . __('beers.currency') }}</td>
                    <td class="px-2 text-center">{{ $order->getCreatedAt() }}</td>
                    <td class="px-2 text-center">{{ $order->getOrderState() }}</td>
                    <td class="px-2 text-center">
                        <x-userspace.button color="primary solid" route="user.orders.show" :params="['id' => $order->getId()]">
                            <i class="fa-solid fa-circle-info"></i>
                            {{ __('orders.index.details') }}
                        </x-userspace.button>
                    </td>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <p class="font-bold text-center">{{ __('messages.no-data') }}</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
