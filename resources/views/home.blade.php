<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav />
        @include('__header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-malla-articulos :posts="$posts" />
        </main>

        <x-footer />
    </section>
</x-layout>