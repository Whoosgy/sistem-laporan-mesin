@props(['active'])

@php
$classes = ($active ?? false)
            // Kelas untuk link AKTIF
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-white text-sm font-medium leading-5 text-white focus:outline-none transition duration-150 ease-in-out'
            // Kelas untuk link TIDAK AKTIF
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-200 hover:text-white hover:border-blue-300 focus:outline-none focus:text-white focus:border-blue-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>