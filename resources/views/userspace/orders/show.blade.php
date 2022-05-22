@extends('userspace.layouts.app')
@section('title', __('orders.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.orders').'.show', $viewData['order']) }}
@endsection

@section('content')
    <div class="px-2">
        <div class="mb-8">
            <div class="flex justify-between mb-5">
                <x-typography.subtitle>
                    # {{ $viewData['order']->getId() }}
                </x-typography.subtitle>
                <div class="flex flex-col md:flex-row">
                    <x-userspace.button color="danger solid" route="user.orders.download" :params="['id' => $viewData['order']->getId(), 'type' => 'pdf']">
                        <i class="fa-solid fa-file-pdf"></i>
                        {{ __('orders.download') }} PDF
                    </x-userspace.button>
                    <x-userspace.button color="success solid" route="user.orders.download" :params="['id' => $viewData['order']->getId(), 'type' => 'csv']">
                        <i class="fa-solid fa-file-csv"></i>
                        {{ __('orders.download') }} CSV
                    </x-userspace.button>
                    <x-userspace.button color="danger solid" route="user.orders.refund" :params="['id' => $viewData['order']->getId()]">
                        {{ __('orders.refund') }}
                    </x-userspace.button>
                </div>
            </div>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="mb-2 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
                    <strong>{{ __('orders.order.state') }}:</strong>
                    <br/>
                    <span class="block sm:inline">{{ $viewData['order']->getOrderState() }}</span>
                </div>
                <div class="mb-2 bg-gray-100 border border-gray-400 text-gray-700 px-4 py-3 rounded relative">
                    <strong>{{ __('orders.created.date') }}:</strong>
                    <br/>
                    {{ $viewData['order']->getCreatedAt() }}
                </div>
                <div class="mb-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <strong>
                        {{ __('orders.address') }}:
                    </strong>
                    <br/>
                    {{ $viewData['order']->getAddress() }},
                    {{ $viewData['order']->getCity() }},
                    {{ $viewData['order']->getDepartment() }}
                </div>
                <div class="mb-2 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative">
                    <strong>{{ __('orders.payment.method') }}:</strong>
                    <br/>
                    {{ $viewData['order']->getPaymentMethod() }}
                </div>
            </div>
        </div>
        <div class="block">
            @foreach ($viewData['orderItems'] as $orderItem)
                <div class="bg-white shadow-md px-10 py-4 grid grid-cols-3 gap-4 place-items-center">
                    <div>
                        <img style="height: 125px" src="{{ $orderItem->beer->getURL() }}" class="img-fluid">
                    </div>
                    <div>
                        <h4 class="font-bold">{{ $orderItem->beer->getName() }}</h4>
                        {{ $orderItem->beer->getFormat() }}
                        <br />
                        {{ 'Quantity: ' . $orderItem->getQuantity() }}
                    </div>
                    <div>
                        <p class="text-xl font-bold">{{ $orderItem->beer->getPrice() . ' ' . __('beers.currency') }}</p>
                    </div>
                </div>
            @endforeach
            <h2 class="font-bold text-center my-8">
                {{ __('cart.total') }}: {{ $viewData['order']->getTotal() . ' ' . __('beers.currency') }}
            </h2>
        </div>
    </div>
@endsection
