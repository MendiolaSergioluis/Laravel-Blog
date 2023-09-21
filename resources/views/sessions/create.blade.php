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
                    <div class="mb-6">
                        <label
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="email">
                            Correo Electrónico
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Contraseña Input --}}
                    <div class="mb-6">
                        <label
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="password">
                            Contraseña
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="password"
                            name="password"
                            id="password"
                            required
                        >
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

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
