@props(['titulo'])

<section class="px-6 py-8">
    <h1 class="text-center text-xl font-bold mb-6">{{ $titulo }}</h1>
    <x-tarjeta class="max-w-lg">
        {{ $slot }}
    </x-tarjeta>
</section>
