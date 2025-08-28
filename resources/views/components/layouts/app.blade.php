<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Work of Maintenance' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CSS untuk Latar Belakang dan Partikel --}}
    <style>
        .particle-bg {
            background-color: #f1f5f9; /* Warna terang */
        }
        .dark .particle-bg {
            background-color: #111827; /* Warna gelap */
        }
        #tsparticles {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0; /* Pastikan partikel di belakang */
        }
    </style>
</head>

<body class="font-sans antialiased particle-bg">
    <div id="tsparticles"></div>

    <div class="min-h-screen relative z-10">
        <header class="bg-white dark:bg-slate-900 sticky top-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @include('layouts.navigation')
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>

</html>
