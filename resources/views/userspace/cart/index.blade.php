@extends('userspace.layouts.app')
@section('title', __('cart.title'))
@section('breadcrumbs')
    {{ Breadcrumbs::render(__('navigation.cart')) }}
@endsection

@section('content')
    <table class="table bg-white rounded">
        <thead>
            <tr>
                <th class="border-r-4 p-2 text-center" scope="col">{{ __('beers.title') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('beers.details') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('beers.index.col.price') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('beers.amount') }}</th>
                <th class="p-2 text-center" scope="col">{{ __('beers.index.col.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($viewData['beersInCart'] as $beerItem)
                <tr>
                    <th class="border-r-4 py-4" scope="row">
                        <img class="my-0 mx-auto h-24" src="{{ $beerItem['beer']->getURL() }}" />
                    </th>
                    <td class="px-2 text-center">
                    <h4 class="font-bold">{{ $beerItem['beer']->getName() }}</h4>
                        {{ $beerItem['beer']->getFormat() }}
                        <div class="mt-4 mb-8">
                            <span class="text-bold bg-blue-100 border border-blue-400 text-blue-700 px-2 py-1 rounded relative">
                                {{ $beerItem['beer']->getQuantity() . ' ' . __('cart.in.stock') }}
                            </span>
                        </div>
                    </td>
                    <td class="px-2 text-center">
                        <p class="font-bold min-w-">
                            {{ $beerItem['beer']->getPrice() . ' ' . __('beers.currency') }}
                        </p>
                    </td>
                    <td class="px-2 text-center">
                        <div class="flex">
                            <x-userspace.form-button
                                color="primary solid"
                                route="user.cart.decrement"
                                wrapperProps="flex-grow mx-0 min-w-[40px]"
                                :params="['id' => $beerItem['beer']->getId()]"
                            >
                                <i class="fa-solid fa-minus"></i>
                            </x-userspace.form-button>
                            <p class="self-center w-10 font-bold">{{ $beerItem['quantity'] }}</p>
                            <x-userspace.form-button
                                color="primary solid"
                                route="user.cart.increment"
                                wrapperProps="flex-grow mx-0 min-w-[40px]"
                                :params="['id' => $beerItem['beer']->getId()]"
                            >
                                <i class="fa-solid fa-plus"></i>
                            </x-userspace.form-button>

                        </div>
                    </td>
                    <td class="px-2 text-center">
                        <x-userspace.form-button
                            route="user.cart.remove"
                            color="danger solid"
                            :params="['id' => $beerItem['beer']->getId()]"
                        >
                            {{ __('cart.remove.button') }}
                        </x-userspace.form-button>
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
    @if (count($viewData['beersInCart']) > 0)
        <h2 class="text-2xl font-bold text-center my-8">
            {{ __('cart.total') }}: {{ $viewData['total'] . ' ' . __('beers.currency') }}
        </h2>
    @endif

    @if (count($viewData['beersInCart']) > 0)
        <form method="POST" action="{{ route('user.orders.save') }}" class="flex flex-col">
            @csrf
            <x-typography.subtitle>
                {{ __('cart.order.title') }}
            </x-typography.subtitle>
            <div class="flex">
                <div class="flex-grow mx-4">
                    <x-userspace.input
                        label="{{ __('billing.department') }}"
                        type="text"
                        name="department"
                        autocomplete="department"
                        required
                        errorClass="{{ $errors->has('department') ? 'ring-red-700 border-red-700' : '' }}"
                        :value="old('department')"
                    />
                    <x-userspace.input
                        label="{{ __('billing.city') }}"
                        type="text"
                        name="city"
                        autocomplete="city"
                        required
                        errorClass="{{ $errors->has('city') ? 'ring-red-700 border-red-700' : '' }}"
                        :value="old('city')"
                    />
                    <x-userspace.input
                        label="{{ __('billing.address') }}"
                        type="text"
                        name="address"
                        autocomplete="address"
                        required
                        errorClass="{{ $errors->has('address') ? 'ring-red-700 border-red-700' : '' }}"
                        :value="old('address')"
                    />
                </div>
                <div class="flex-grow mx-4">
                    <label for="paymentMethod" class="block mb-2 text-md font-medium text-gray-900">
                        <strong>{{ __('billing.payment-method') }}</strong>
                    </label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="paymentMethod"
                    >
                        <option value="CREDIT_CARD">{{ __('billing.payment-method.credit-card') }}</option>
                        <option value="CASH">{{ __('billing.payment-method.cash') }}</option>
                        <option value="PSE">{{ __('billing.payment-method.pse') }}</option>
                    </select>
                </div>
            </div>
            <x-userspace.button color="success solid" render="button type=submit">
                {{ __('cart.confirm') }}
            </x-userspace.button>
        </form>
    @endif
    <br />
@endsection
