@props(['disparador'])

<div x-data="{show:false}" class="font-semibold capitalize relative">

    {{-- Disparador --}}
    <div @click="show=!show">
        {{ $disparador }}
    </div>

    {{-- Enlaces --}}
    <div x-show="show" x-cloak @click.away="show=false" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52">
        {{ $slot }}
    </div>
</div>
