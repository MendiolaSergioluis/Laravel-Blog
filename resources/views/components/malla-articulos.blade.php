@props(['posts'])

@if ($posts->count())

    <x-articulo-principal :post=" $posts[0]"/>

    @if ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">

            @foreach ($posts->skip(1) as $post)
                <x-articulo :post=" $post" class="{{ $loop->iteration >2 ? 'col-span-2' : 'col-span-3' }}"/>
            @endforeach

        </div>
    @endif

@else
    <p class="text-center">No hay artículos aún. Por favor intente después</p>
@endif
