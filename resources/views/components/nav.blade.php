<nav class="flex flex-col items-center justify-center md:flex-row md:justify-between md:items-center mb-10">
    <div>
        <a href="/" class="font-semibold text-3xl">
            {{-- <img src="/images/logo.svg" alt="Company Logo" width="165" height="16"> --}}
            Blog Laravel
        </a>
    </div>

    <div class="mt-8 md:flex md:mt-0 items-center justify-center text-center">
        @auth
            <span class="text-xs font-bold uppercase">Hola, {{ auth()->user()->name }}</span>
            <form action="/logout" method="POST" class="text-xs font-semibold text-blue-500 mt-2 md:mt-0 md:ml-6">
                @csrf
                {{--  Button --}}
                <button
                    type="submit"
                    class="text-xs font-bold uppercase">
                    Cerrar Sesión
                </button>
            </form>
        @else
            <a href="/register" class="text-xs font-bold uppercase block">Registrate</a>
            <a href="/login" class="md:ml-3 text-xs font-bold uppercase block mt-2 md:mt-0">Inicia Sesión</a>
        @endauth

        {{-- <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a> --}}
    </div>
</nav>
