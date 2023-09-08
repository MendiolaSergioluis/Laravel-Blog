<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-3xl">
        <span class="text-blue-500">Desarrollo Web</span> <br class="md:hidden"> Con TALL Stack
    </h1>

    {{-- <h2 class="inline-flex mt-2">By Lary Laracore
        <img src="/images/lary-head.svg" alt="Head of Lary the mascot">
    </h2> --}}

    <p class="text-sm mt-14">
        Comparte tus conocimientos de TailwindCSS, AlpineJS, Laravel y Livewire con la comunidad.
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

            <x-menu-desplegable class="capitalize">

                <x-slot name="disparador">
                    <button class="py-2 pl-3 pr-9 text-sm w-full lg:w-32 text-left flex lg:inline-flex capitalize">
                        {{ isset($currentCategory) ? $currentCategory->name : 'Categorías'}}
                        <x-icono nombre="flecha-abajo" class="absolute pointer-events-none" />
                    </button>
                </x-slot>

                <x-menu-desplegable-item href="/" :activo="request()->routeIS('home')">
                    Todas
                </x-menu-desplegable-item>
                @foreach ($categories as $category)
                <x-menu-desplegable-item href="/categories/{{ $category->slug }}"
                    :activo="request()->is('categories/'. $category->slug)">
                    {{ $category->name }}
                </x-menu-desplegable-item>
                @endforeach
            </x-menu-desplegable>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Encuentra algo..."
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>