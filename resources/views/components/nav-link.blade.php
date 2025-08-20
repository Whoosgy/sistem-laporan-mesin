@props(['active'])

@php
$classes = ($active ?? false)
            // DIUBAH: Menambahkan focus:ring-0 untuk menghilangkan garis fokus bawaan browser
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-semibold leading-5 text-blue-700 dark:text-blue-300 focus:outline-none focus:ring-0 transition duration-150 ease-in-out'
            // DIUBAH: Menambahkan focus:ring-0 untuk menghilangkan garis fokus bawaan browser
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-blue-300 hover:border-slate-300 dark:hover:border-slate-700 focus:outline-none focus:ring-0 focus:text-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
