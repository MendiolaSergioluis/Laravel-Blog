@props(['comment'])
<article class="flex gap-4 bg-gray-100 p-6 rounded-xl border-gray-200 space-x-2">
    <div class="flex-shrink-0">
        <img src=https://i.pravatar.cc/60?u={{ $comment->author->name }}" alt="usuario-avatar" width="60" height="60" class="rounded-xl">
    </div>
    <div>
        <header>
            <h3 class="font-bold capitalize">{{ $comment->author->name }}</h3>
            <p class="text-xs">Publicado
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p class="mt-4 text-justify">
            {{ $comment->body }}
        </p>
    </div>
</article>
