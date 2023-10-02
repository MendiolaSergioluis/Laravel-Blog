<x-layout>
    <x-slot:title>
        Posts: Admin
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>
        <x-settings titulo="Administrar">
        <div class="mb-6 flex w-full flex-col">
                <div class="overflow-x-auto shadow">
                    <table class="w-full overflow-x-auto">
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $post)
                            <tr>
                                {{-- Nombre del Post --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <a href="/posts/{{ $post->slug  }}" class="text-sm font-medium text-gray-900">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                </td>
                                {{-- Botón para Editar --}}
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="/admin/posts/{{ $post->id }}/edit"
                                       class="text-blue-500 hover:text-blue-600">Editar</a>
                                </td>
                                {{-- Botón para Eliminar --}}
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <form action="/admin/posts/{{ $post->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-600">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="flex justify-center">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>


        </x-settings>
        <x-footer/>
    </section>
</x-layout>
