<x-layout>
    <x-slot:title>
        Post: Crear
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="¡Crea una nueva categoría!">
            <form action="/admin/categories" method="POST" novalidate enctype="multipart/form-data" class="mt-10">
                @csrf
                {{-- Nombre de Categoría --}}
                <x-form.input name="name" label="Nombre de Categoría" type="text"/>

                {{--  Button --}}
                <div class="mb-6 flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Crear Categoría
                    </button>
                </div>
            </form>
        </x-settings>
        <x-footer/>
    </section>
</x-layout>
