<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-3xl">
        <span class="text-blue-500">Desarrollo Web</span> <br class="md:hidden"> Con TALL Stack
    </h1>

    <p class="text-sm mt-14">
        Comparte tus conocimientos de TailwindCSS, AlpineJS, Laravel y Livewire con la comunidad.
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

            <x-categorias-menu-desplegable />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">

                {{-- Agrega categoría en un input oculto para pasar ambos parámetros al momento de buscar, y que no se pierda la categoría--}}
                @if(request('category'))
                    <input
                        type="hidden"
                        name="category"
                        value="{{ request('category') }}"
                    >
                @endif

                <input
                    type="text"
                    name="search"
                    placeholder="Encuentra algo..."
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>
