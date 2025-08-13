<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Maintenance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-200 dark:bg-gray-900">
    <div class="container mx-auto px-4 py-8 lg:py-12">

        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 dark:text-white">Dasbor Laporan Maintenance</h1>
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md shadow-sm text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                &larr; Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg flex items-center space-x-4">
                <div class="bg-yellow-500/10 p-4 rounded-full">
                    <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Pending</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $pendingCount }}</p>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg flex items-center space-x-4">
                <div class="bg-blue-500/10 p-4 rounded-full">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h5M20 20v-5h-5"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 9a9 9 0 0114.13-5.87M20 15a9 9 0 01-14.13 5.87"></path></svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Dalam Proses</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $prosesCount }}</p>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg flex items-center space-x-4">
                <div class="bg-green-500/10 p-4 rounded-full">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Selesai</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $selesaiCount }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Laporan Masuk</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Pelapor</th>
                            <th scope="col" class="px-6 py-3">Departemen/Plant</th>
                            <th scope="col" class="px-6 py-3">Jenis</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse ($semuaLaporan as $laporan)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="px-6 py-4">{{ $laporan->tanggal_lapor }}</td>
        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $laporan->nama_pelapor }}</td>
        <td class="px-6 py-4">{{ $laporan->plant }}</td>
        
        {{-- PERBAIKAN: Cek dulu apakah $laporan->maintenance ada --}}
        <td class="px-6 py-4">{{ optional($laporan->maintenance)->jenis_perbaikan ?? 'N/A' }}</td>
        
        <td class="px-6 py-4">
            {{-- PERBAIKAN: Logika status yang lebih aman --}}
            @php
                $status = optional($laporan->maintenance)->status ?? 'Pending';
            @endphp

            @if($status == 'Pending')
                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">{{ $status }}</span>
            @elseif($status == 'Dalam Proses')
                <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">{{ $status }}</span>
            @else
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{ $status }}</span>
            @endif
        </td>
        <td class="px-6 py-4 flex justify-center items-center space-x-2">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
            <a href="#" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Update</a>
        </td>
    </tr>
    @empty
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
            Belum ada laporan yang masuk.
        </td>
    </tr>
    @endforelse
</tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>