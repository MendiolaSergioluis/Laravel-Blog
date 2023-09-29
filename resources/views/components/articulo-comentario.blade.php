@props(['comment'])

<x-tarjeta>
    <article
        class="flex flex-col items-center gap-4 text-center space-x-2 md:flex-row md:text-left">
        <div class="flex-shrink-0">
            <img src=https://i.pravatar.cc/60?u={{ $comment->author->name }}" alt="usuario-avatar" width="60"
                 height="60"
                 class="rounded-xl text-center">
        </div>
        <div>
            <header>
                <h3 class="font-bold capitalize">{{ $comment->author->name }}</h3>
                <p class="text-xs">Publicado
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>
            <p class="mt-4 text-center md:text-justify">
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-tarjeta>
