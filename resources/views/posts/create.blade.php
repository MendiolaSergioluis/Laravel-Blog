<x-layout>
    <x-slot:title>
        Post: Crear
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-tarjeta class="max-w-lg m-auto">
            <h1 class="text-center font-bold text-xl mb-10">¡Crea un Nuevo Artículo!</h1>
            <form action="/admin/posts" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                {{-- Titulo Input --}}
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="title">
                        Titulo
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                    >
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Imágen Input --}}
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="thumbnail">
                        Imágen
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="file"
                        name="thumbnail"
                        id="thumbnail"
                        value="{{ old('thumbnail') }}"
                        required
                    >
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Resumen Input --}}
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="excerpt">
                        Resumen
                    </label>
                    <textarea
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="excerpt"
                        id="excerpt"
                        required
                    >{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Contenido Input --}}
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="body">
                        Contenido
                    </label>
                    <textarea
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="body"
                        id="body"
                        required
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Selector de Categoría --}}
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id">
                        Elige una categoría
                    </label>
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
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
        </x-tarjeta>

        <x-footer/>
    </section>
</x-layout>
