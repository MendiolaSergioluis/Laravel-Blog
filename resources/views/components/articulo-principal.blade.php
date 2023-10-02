@props(['post'])

<article
    class="rounded-xl border border-black border-opacity-0 p-4 transition-colors duration-300 hover:border-opacity-5 hover:bg-gray-100">
    <div class="py-6 md:px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail )  }}" alt="Blog Post illustration"
                 class="aspect-square rounded-xl object-cover object-bottom">
        </div>
        <div class="flex flex-1 flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/?category={{ $post->category->slug}}"
                       class="rounded-full border border-blue-300 px-3 py-1 text-xs font-semibold uppercase text-blue-300"
                       style="font-size: 10px">{{ $post->category->name }}</a>
                </div>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h1>
                    <span class="mt-2 block text-xs text-gray-400">
                        Publicado <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>
            <div class="mt-2 text-justify text-sm">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>
            <footer class="mt-8 flex flex-col items-center justify-between gap-4 md:flex-row">
                <div class="flex items-center text-sm">
                    {{-- <img src="/images/lary-avatar.svg" alt="Lary avatar"> --}}
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->slug }}">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>
                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="rounded-full bg-gray-200 px-8 py-2 text-xs font-semibold transition-colors duration-300 hover:bg-gray-300">
                        Leer más
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
