@props(['active'=> false])

@php
    $classes = 'block text-left px-4 text-s leading-6 hover:bg-gray-400 focus:bg-gray-400';
if ($active) $classes .= ' bg-blue-500 text-white'
@endphp

<a {{$attributes([ 'class' => $classes ])}}
>{{ $slot }}</a>
