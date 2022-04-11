@props(['active'])

@php
$classes = ($active ?? false)
            ? 'barra underline p-2 '
            : 'p-2 ';
@endphp

<a {{$attributes->merge(['class' => $classes]) }} >
    <h2 class="navlink">{{ $slot }}</h2>
</a>
