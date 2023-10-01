@props(['titulo'])

<section class="mx-auto max-w-4xl px-6 py-8">
    <h1 class="mb-8 border-b pb-2 text-xl font-bold">{{ $titulo }}</h1>

    <x-tarjeta class="max-w-4xl">
        <div class="flex">
            <aside class="w-52">
                <h4 class="font-bold mb-4">Enlaces</h4>
                <ul class="font-semibold">
                    <li class="flex flex-col">
                        <a href="/admin/dashboard"
                           class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">Panel de Control</a>
                        <a href="/admin/posts/create"
                           class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Nuevo Artículo</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </x-tarjeta>
</section>
