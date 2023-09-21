<x-layout>
    <x-slot:title>
        Post: {{ $post->title }}
    </x-slot:title>
    <section class="px-6 py-8">
        <x-nav/>

        <main class="mx-auto mt-10 max-w-6xl space-y-6 lg:mt-20">
            <article class="mx-auto max-w-4xl gap-x-10 lg:grid lg:grid-cols-12">
                <div class="col-span-4 mb-10 lg:pt-14 lg:text-center">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-xs text-gray-400">
                        Publicado
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="mt-4 flex items-center text-sm lg:justify-center">
                        {{-- <img src="/images/lary-avatar.svg" alt="Lary avatar"> --}}
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->slug }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="mb-6 hidden justify-between lg:flex">
                        <a href="/"
                           class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Volver a Artículos
                        </a>

                        <div class="space-x-2">
                            <a href="/?category={{ $post->category->slug}}"
                               class="rounded-full border border-blue-300 px-3 py-1 text-xs font-semibold uppercase text-blue-300"
                               style="font-size: 10px">{{ $post->category->name }}</a>
                        </div>
                    </div>

                    <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                        {{ $post->title }}
                    </h1>

                    <div class="leading-loose space-y-4 lg:text-lg">
                        <p>
                            {{ $post->body }}
                        </p>

                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @auth()
                        <x-tarjeta>
                        <form action="#" method="POST"
                              class="flex flex-col gap-4">
                            @csrf

                            <header class="flex flex-row items-center gap-4 font-semibold">
                                <img src=https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="usuario-avatar" width="50"
                                     height="50" class="rounded-full">
                                ¿Desea participar?
                            </header>
                            <div class="mt-4">
                                <textarea name="body" id="body" cols="30" rows="5"
                                          class="w-full rounded-xl border-gray-200 p-4 text-sm"
                                          placeholder="Escribe algo aquí..."></textarea>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit"
                                        class="rounded-2xl bg-blue-500 px-6 py-2 text-xs font-semibold uppercase text-white hover:bg-blue-600">
                                    Comentar
                                </button>
                            </div>
                        </form>
                        </x-tarjeta>
                    @endauth

                    @foreach($post->comments as $comment)

                        <x-articulo-comentario :comment="$comment"/>
                    @endforeach
                </section>
            </article>
        </main>

        <x-footer/>
    </section>
</x-layout>
