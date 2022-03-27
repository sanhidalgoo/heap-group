@extends('userspace.layouts.app')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body px-5">
                    <div class="row mb-4 align-items-end">
                        <h5 class="card-title col-9">
                            {{ __('orders.id') . ': ' . $viewData['order']->getId() }}
                        </h5>
                    </div>
                    <div class="row">
                        <p class="card-text col"><strong>{{ __('orders.created.date') }}:
                            </strong>{{ $viewData['order']->getCreatedDate() }}</p>
                        <p class="card-text col"><strong>{{ __('orders.order.state') }}:
                            </strong>{{ $viewData['order']->getOrderState() }}</p>
                    </div>
                    <p class="card-text col"><strong>{{ __('orders.total') }}:
                        </strong>{{ $viewData['order']->getTotal() }}</p>
                    <div class="row">
                        <p class="card-text col"><strong>{{ __('orders.city') }}:
                            </strong>{{ $viewData['order']->getCity() }}</p>
                        <p class="card-text col"><strong>{{ __('orders.department') }}:
                            </strong>{{ $viewData['order']->getDepartment() }}</p>
                        <p class="card-text col"><strong>{{ __('orders.address') }}:
                            </strong>{{ $viewData['order']->getAddress() }}</p>
                    </div>
                    <p class="card-text"><strong>{{ __('orders.payment.method') }}:
                        </strong>{{ $viewData['order']->getPaymentMethod() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
