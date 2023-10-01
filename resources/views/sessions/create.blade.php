<x-layout>
    <x-slot:title>
        Registro
    </x-slot:title>
    <section class="min-h-screen px-6 py-8">
        <x-nav/>
        <x-contenedor-formularios titulo="¡Inicia Sesión!">
            <form action="/login" method="POST" class="mt-10" novalidate>
                @csrf

                {{-- Correo Electrónico Input --}}
                <x-form.input name="email" label="Correo Electrónico" type="email" autocomplete="username"/>
                {{-- Contraseña Input --}}
                <x-form.input name="password" label="Contraseña" type="password" autocomplete="current-password"/>

                {{-- Enviar Button --}}
                <div class="mb-6">
                    <button
                        type="submit"
                        class="rounded bg-blue-400 px-4 py-2 text-white hover:bg-blue-500">
                        Enviar
                    </button>
                </div>
            </form>
        </x-contenedor-formularios>

        <x-footer/>
    </section>
</x-layout>
