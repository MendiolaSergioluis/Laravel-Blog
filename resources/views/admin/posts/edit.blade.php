<x-layout>
    <x-slot:title>
        Post: Editar
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="Edita el Artículo : {{ $post->title }}">
            <form action="/admin/posts/{{ $post->id }}" method="POST" novalidate enctype="multipart/form-data" class="mt-10">
                @csrf
                @method('PATCH')
                {{--Título--}}
                <x-form.input name="title" label="Título" type="text" :value="old('title', $post->title)" />
                {{--Imágen--}}
                <div class="flex flex-col md:flex-row md:gap-6 md:items-center md:justify-between mb-6">
                <x-form.input name="thumbnail" label="Imágen" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl border border-gray-300 drop-shadow-lg" width="200">
                </div>
                {{--Resumen--}}
                <x-form.area name="excerpt" label="Resumen">{{ old('excerpt', $post->excerpt) }}</x-form.area>
                {{--Contenido--}}
                <x-form.area name="body" label="Contenido">{{ old('body', $post->body) }}</x-form.area>
                {{-- Selector de Categoría --}}
                <div class="mb-6">
                    <x-form.label name="category_id" label="Categoría"/>
                    <select name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::orderBy('name')->get();
                        @endphp

                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected':'' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id"/>
                </div>

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
