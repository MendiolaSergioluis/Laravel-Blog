<x-layout>
    <x-slot:title>
        Post: Crear
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="¡Crea un nuevo artículo!">
            @if(App\Models\Category::all()->count() === 0)
                <p class="font-semibold text-center">¡Debes crear antes al menos una categoría!</p>
            @else
            <form action="/admin/posts" method="POST" novalidate enctype="multipart/form-data" class="mt-10">
                @csrf
                {{--Título--}}
                <x-form.input name="title" label="Título" type="text"/>
                {{--Imágen--}}
                <x-form.input name="thumbnail" label="Imágen" type="file"/>
                {{--Resumen--}}
                <x-form.area name="excerpt" label="Resumen"/>
                {{--Contenido--}}
                <x-form.area name="body" label="Contenido"/>
                {{-- Selector de Categoría --}}
                <div class="flex gap-4 items-center">
                    <div class="mb-6">
                        <x-form.label name="category_id" label="Categoría"/>
                        <select name="category_id" id="category_id">
                            @php
                                $categories = \App\Models\Category::orderBy('name')->get();
                            @endphp

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected':'' }}>
                                    {{ ucwords($category->name) }}
                                </option>
                            @endforeach
                        </select>
                        <x-form.error name="category_id"/>
                    </div>
                    <a href="/admin/categories/create"
                       class="text-blue-500">Crear Categoría</a>
                </div>


                {{--  Button --}}
                <div class="mb-6 flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Publicar
                    </button>
                </div>
            </form>
            @endif
        </x-settings>
        <x-footer/>
    </section>
</x-layout>
