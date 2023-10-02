<x-layout>
    <x-slot:title>
        Post: Crear
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="¡Crea un nuevo artículo!">
            <form action="/admin/categories/{{ $category->id }}" method="POST" novalidate enctype="multipart/form-data" class="mt-10">
                @csrf
                @method('PATCH')
                {{-- Nombre de Categoría --}}
                <x-form.input name="name" label="Nombre de Categoría" type="text" :value="old('name', $category->name)"/>

                {{--  Button --}}
                <div class="mb-6 flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Confirmar Edición
                    </button>
                </div>
            </form>
        </x-settings>
        <x-footer/>
    </section>
</x-layout>
