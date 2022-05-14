@props([
    'type',
    'name',
    'label' => '',
    'placeholder' => '',
    'autocomplete' => '',
    'autofocus' => false,
    'required' => false,
    'value' => '',
    'errorClass' => '',
    'extraProps' => '',
])

<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 text-md font-medium text-gray-900">
        <strong>{{ $label }}</strong>
    </label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        autocomplete="{{ $autocomplete }}"
        autofocus="{{ $autofocus }}"
        required="{{ $required }}"
        value="{{ $value }}"
        {{ $extraProps }}
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $errorClass }}"
    />
    @error('email')
        <span class="text-red-700 text-sm" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
