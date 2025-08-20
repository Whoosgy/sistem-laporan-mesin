@props(['active'])

@php
$classes = ($active ?? false)
            // DIUBAH: Menghapus background color (bg-blue-50) agar transparan
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-blue-500 text-start text-base font-medium text-blue-700 dark:text-blue-300 focus:outline-none focus:text-blue-800 focus:border-blue-700 transition duration-150 ease-in-out'
            // DIUBAH: Menghapus background color saat hover (hover:bg-slate-50) agar transparan
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 hover:border-slate-300 focus:outline-none focus:text-blue-800 focus:border-slate-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
