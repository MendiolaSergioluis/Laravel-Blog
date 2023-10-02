@props(['titulo'])

<section class="mx-auto max-w-4xl sm:px-6 py-8">
    <h1 class="mb-8 border-b pb-2 text-xl font-bold">{{ $titulo }}</h1>

    <x-tarjeta class="max-w-4xl">
        <div class="flex flex-col gap-4 lg:flex-row">
            <aside class="w-full flex-shrink-0 border-b border-gray-300 pb-4 lg:w-52 lg:border-none">
                <h4 class="mb-4 font-bold">Enlaces</h4>
                <ul class="font-semibold">
                    <li class="flex flex-col">
                        <a href="/admin/posts"
                           class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Artículos</a>
                        <a href="/admin/posts/create"
                           class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Nuevo Artículo</a>
                        <hr class="my-4 border-gray-300">
                        <a href="/admin/categories"
                           class="{{ request()->is('admin/categories') ? 'text-blue-500' : '' }}">Categorías</a>
                        <a href="/admin/categories/create"
                           class="{{ request()->is('admin/categories/create') ? 'text-blue-500' : '' }}">Nueva Categoría</a>
                    </li>
                </ul>
            </aside>

            <main class="w-full">
                {{ $slot }}
            </main>
        </div>
    </x-tarjeta>
</section>
