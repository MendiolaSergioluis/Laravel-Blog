<x-layout>
    <x-slot:title>
        Registro
    </x-slot:title>
    <section class="px-6 py-8 min-h-screen">
        <x-nav/>
        <section class="px-6 py-8">

            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
                <h1 class="text-center font-bold text-xl">¡Inicia Sesión!</h1>
                <form action="/login" method="POST" class="mt-10" novalidate>
                    @csrf

                    {{-- Correo Electrónico Input --}}
                    <x-form.input name="email" label="Correo Electrónico" type="email"/>
                    {{-- Contraseña Input --}}
                    <x-form.input name="password" label="Contraseña" type="password"/>

                    {{-- Enviar Button --}}
                    <div class="mb-6">
                        <button
                            type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Enviar
                        </button>
                    </div>

                </form>
            </main>

        </section>
        <x-footer/>
    </section>
</x-layout>
