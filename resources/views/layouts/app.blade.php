<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Sistem Laporan Mesin' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-slate-100 dark:bg-slate-900">
        <div class="min-h-screen">

            <header class="bg-jembo-blue shadow-md sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                 
                </div>
            </header>

        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    {{-- PERBAIKAN: Pindahkan script listener ke dalam body --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('laporan-sukses', (message) => {
                // Pastikan Swal sudah dimuat dan tersedia
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: message,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#2D3D8B' // Warna jembo-blue
                    });
                }
            });
        });
    </script>
</body>

</html>