<nav class="mb-10 flex flex-col items-center justify-center md:flex-row md:items-center md:justify-between">
    <div>
        <a href="/" class="text-3xl font-semibold">
            {{-- <img src="/images/logo.svg" alt="Company Logo" width="165" height="16"> --}}
            Blog Laravel
        </a>
    </div>
    <div class="mt-8 items-center justify-center text-center md:mt-0 md:flex">
        @auth
            <x-menu-desplegable>
                <x-slot name="disparador">
                    <button class="text-xs font-bold uppercase">Hola, {{ auth()->user()->name }}</button>
                </x-slot>
                @admin
                <x-menu-desplegable-item href="/admin/posts">Administrar</x-menu-desplegable-item>
                <x-menu-desplegable-item
                    href="/admin/posts/create"
                    :activo="request()->is('admin/posts/create')">
                    Nuevo Artículo
                </x-menu-desplegable-item>
                @endadmin
                <x-menu-desplegable-item
                    href="#"
                    x-data="{}"
                    @click.prevent="document.querySelector('#logout-form').submit()">
                    Cerrar Sesión
                </x-menu-desplegable-item>

                <form action="/logout" method="POST" class="hidden" id="logout-form">
                    @csrf
                </form>
            </x-menu-desplegable>
        @else
            <a href="/register" class="block text-xs font-bold uppercase">Registrate</a>
            <a href="/login" class="mt-2 block text-xs font-bold uppercase md:mt-0 md:ml-3">Inicia Sesión</a>
        @endauth
    </div>
</nav>
