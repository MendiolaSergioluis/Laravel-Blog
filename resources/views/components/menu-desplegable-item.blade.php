@props(['activo'=>false])

@php
    $clases = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';

    if($activo) $clases .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class'=>$clases]) }}>
    {{ $slot }}
</a>