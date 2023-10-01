@props([
    'name',
    'label',
    'type'
    ])

<div class="mb-6">
    <x-form.label name="{{ $name }}" label="{{ $label }}"/>
    <input
        class="border border-gray-400 p-2 w-full"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes(['value' => $type !== 'password' ? old($name) : '', ]) }}
    >
    <x-form.error name="{{ $name }}"/>
</div>
