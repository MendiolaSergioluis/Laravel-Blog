@props(['name','label'])

<div class="mb-6">
    <x-form.label name="{{ $name }}" label="{{ $label }}"/>
    <textarea
        class="border border-gray-400 p-2 w-full"
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ $slot ?? old($name) }}</textarea>
    <x-form.error name="{{ $name }}"/>
</div>
