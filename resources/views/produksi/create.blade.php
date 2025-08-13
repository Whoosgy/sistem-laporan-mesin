<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Laporan Produksi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-200 dark:bg-gray-900">
        <div class="container mx-auto px-4 py-8 lg:py-12">

            <div class="max-w-5xl mx-auto">
                {{-- Card Form Utama --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white">
                            Laporan Kerusakan Mesin
                        </h1>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Harap isi semua detail kerusakan yang dilaporkan oleh bagian produksi.
                        </p>
                    </div>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <form action="{{ route('produksi.store') }}" method="POST">
                        @csrf
                        <div class="p-6 sm:p-8 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Kolom Kiri --}}
                                <div class="space-y-6">
                                    <div>
                                        <label for="tanggal_lapor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Lapor</label>
                                        <input type="date" name="tanggal_lapor" id="tanggal_lapor" required
                                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                    </div>
                                    <div>
                                        <label for="shift" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Shift</label>
                                        <select name="shift" id="shift" required
                                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                            <option>Pagi</option>
                                            <option>Siang</option>
                                            <option>Malam</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="plant" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plant</label>
                                        <input type="text" name="plant" id="plant" placeholder="Contoh: A"
                                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                    </div>
                                </div>
                                {{-- Kolom Kanan --}}
                                <div class="space-y-6">
                                    <div>
                                        <label for="jam_lapor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jam Lapor</label>
                                        <input type="time" name="jam_lapor" id="jam_lapor" required
                                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                    </div>
                                    <div>
                                        <label for="nama_mesin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Mesin</label>
                                        <input type="text" name="nama_mesin" id="nama_mesin" required placeholder="Contoh: Ex-120B"
                                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                    </div>
                                    <div>
                                        <label for="nama_pelapor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pelapor</label>
                                        <input type="text" name="nama_pelapor" id="nama_pelapor" required placeholder="Nama lengkap pelapor"
                                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="bagian_rusak" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bagian / Sparepart yang Rusak</label>
                                <input type="text" name="bagian_rusak" id="bagian_rusak" placeholder="Contoh: Bearing caterpillar binder"
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]">
                            </div>
                            <div>
                                <label for="uraian_kerusakan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uraian Kerusakan</label>
                                <textarea name="uraian_kerusakan" id="uraian_kerusakan" rows="4" required placeholder="Jelaskan detail kerusakan di sini..."
                                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:shadow-sm focus:outline-none py-2 px-3 transition-transform duration-200 ease-out transform hover:scale-[1.02] focus:scale-[1.02]"></textarea>
                            </div>
                        </div>

                        {{-- Footer Form --}}
                        <div class="bg-gray-50 dark:bg-gray-800/50 px-6 py-4 flex justify-between items-center">
                            
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md shadow-sm text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-800 focus:ring-indigo-500 transition-transform duration-200 ease-out transform hover:scale-105">
                                Kembali
                            </a>

                            <div class="flex items-center space-x-2">
                                <button type="reset"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md shadow-sm text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-800 focus:ring-gray-400 transition-transform duration-200 ease-out transform hover:scale-105">
                                    Reset
                                </button>
                                
                                <button type="submit"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-800 focus:ring-blue-500 transition-transform duration-200 ease-out transform hover:scale-105">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- PERBAIKAN: Blok Script SweetAlert ditambahkan kembali di sini --}}
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: "{{ session('success') }}",
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3B82F6'
                        });
                    }
                });
            </script>
        @endif

    </body>
</html>