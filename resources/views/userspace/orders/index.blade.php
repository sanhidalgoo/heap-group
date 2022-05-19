@extends('userspace.layouts.app')
@section('title', __('orders.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.orders')) }}
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th class="text-center" scope="col">{{ __('orders.index.col.id') }}</th>
                <th class="text-center" scope="col">{{ __('orders.index.col.total') }}</th>
                <th class="text-center" scope="col">{{ __('orders.index.col.date') }}</th>
                <th class="text-center" scope="col">{{ __('orders.index.col.status') }}</th>
                <th class="text-center" scope="col">{{ __('orders.index.col.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($viewData["orders"] as $order)
                <tr>
                    <th scope="row">{{ $order->getId() }}</th>
                    <td>{{ $order->getTotal() }}</td>
                    <td>{{ $order->getCreatedAt() }}</td>
                    <td>{{ $order->getOrderState() }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.orders.show', ['id' => $order->getId()]) }}" class="btn btn-success">
                            <i class="fa-solid fa-circle-info"></i>
                            {{ __('orders.index.details') }}
                        </a>
                    </td>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <p class="fw-bold text-center">{{ __('messages.no-data') }}</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
