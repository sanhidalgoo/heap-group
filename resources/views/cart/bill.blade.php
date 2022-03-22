<form method="POST" action="{{ route('user.cart.purchase') }}">
    @csrf
    <p class="form-control mb-2">
        <label for="cars">{{ __('billing.payment-method') }}</label>
        <select name="paymentMethod">
            <option value="CREDIT_CARD">{{ __('billing.payment-method.credit-card') }}</option>
            <option value="CASH">{{ __('billing.payment-method.cash') }}</option>
            <option value="PSE">{{ __('billing.payment-method.pse') }}</option>
        </select>
    </p>
    <input type="text" class="form-control mb-2" placeholder={{ __('billing.department') }} name="department"
        value="{{ old('department') }}" />
    <input type="text" class="form-control mb-2" placeholder={{ __('billing.city') }} name="city" value="{{ old('city') }}" />
    <input type="text" class="form-control mb-2" placeholder={{ __('billing.address') }} name="address"
        value="{{ old('address') }}" />
    <input type="submit" class="btn btn-primary" value="Send" />
</form>
