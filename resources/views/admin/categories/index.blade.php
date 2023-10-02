<x-layout>
    <x-slot:title>
        Posts: Admin
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="Administrar Categorías">
            <div class="mb-6 flex w-full flex-col">
                <div class="overflow-x-auto shadow">
                    <table class="w-full overflow-x-auto">
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($categories as $category)
                            <tr>
                                {{-- Nombre del Post --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $category->name }}
                                        </p>
                                    </div>
                                </td>
                                {{-- Botón para Editar --}}
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="/admin/categories/{{ $category->id }}/edit"
                                       class="text-blue-500 hover:text-blue-600">Editar</a>
                                </td>
                                {{-- Botón para Eliminar --}}
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <form action="/admin/categories/{{ $category->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="{{ $category->posts->count() > 0 ? ' text-gray-500 hover:text-gray-500' : 'text-red-500 hover:text-red-600' }}" {{ $category->posts->count() > 0 ? 'disabled' : '' }}>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <p class="font-semibold text-center text-xs mb-4">¡Las categorías con artículos relacionados no pueden ser eliminadas!</p>
            <div class="flex justify-center">
                {{ $categories->links('vendor.pagination.tailwind') }}
            </div>
        </x-settings>
        <x-footer/>
    </section>
</x-layout>
