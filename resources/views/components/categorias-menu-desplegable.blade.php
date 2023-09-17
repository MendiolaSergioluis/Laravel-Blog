<x-menu-desplegable class="capitalize">

    <x-slot name="disparador">
        <button class="py-2 pl-3 pr-9 text-sm w-full lg:w-32 text-left flex lg:inline-flex capitalize">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categorías'}}
            <x-icono nombre="flecha-abajo" class="absolute pointer-events-none"/>
        </button>
    </x-slot>

    <x-menu-desplegable-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :activo="request()->routeIS('home')">
        Todas
    </x-menu-desplegable-item>
    @foreach ($categories as $category)
        <x-menu-desplegable-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :activo="request()->is('categories/'. $category->slug)">
            {{ $category->name }}
        </x-menu-desplegable-item>
    @endforeach

</x-menu-desplegable>
