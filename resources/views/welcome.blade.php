<x-layouts.app>
    @section('title', 'Home - Sistem Laporan Mesin')

    <style>
        /* CSS untuk efek 'glow' pada kartu */
        .glow-effect::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 0% 0%, var(--glow-color) 0%, transparent 40%);
            opacity: 0.2;
            transition: opacity 300ms ease-in-out;
            z-index: -1;
        }

        .card-link:hover .glow-effect::before {
            opacity: 0.4;
        }
    </style>


    <div class="relative min-h-[calc(100vh-4rem)] w-full overflow-hidden">

        <canvas id="particle-background" class="absolute top-0 left-0 w-full h-full z-0"></canvas>

        <!-- Kontainer Konten Utama -->
        <div class="relative z-10 flex flex-col items-center justify-center w-full min-h-[calc(100vh-4rem)] p-4 sm:p-6 lg:p-6">

            <div class="w-full max-w-7xl mx-auto">
                <!-- Bagian Header -->
                <div class="text-center mb-6 lg:mb-8" data-aos="fade-down">
                    <h1 class="text-4xl lg:text-4xl font-bold tracking-tight mb-4 bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">
                        Work Order Maintenance
                    </h1>

                </div>

                <!-- Grid untuk Kartu Statistik -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" data-aos="fade-up" data-aos-delay="200">

                    <!-- Card Mekanik -->
                    <a href="{{ route('maintenance.dashboard', ['keterangan' => 'Mekanik']) }}"
                        class="card-link group relative block p-6 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm shadow-md border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                        style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Mechanic </h2>
                                    <p class="text-slate-500 dark:text-slate-400">Mechanical Reports </p>
                                </div>
                                <div class="p-2 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 283.46 283.46" fill="currentColor" stroke="currentColor">
                                        <path d="M200.133,157.32c-2.105-2.105-4.904-3.264-7.881-3.264c-2.977,0-5.776,1.159-7.881,3.264l-9.678,9.678l-14.194-14.194 l43.496-43.494c7.016,3.017,14.634,4.613,22.498,4.613c15.248,0,29.576-5.948,40.341-16.746 c14.694-14.74,20.177-36.316,14.308-56.309c-0.341-1.163-1.272-2.06-2.446-2.359c-1.174-0.3-2.42,0.044-3.276,0.903l-35.874,35.983 c-2.153-0.873-7.577-3.85-17.615-13.858c-10.038-10.008-13.034-15.423-13.915-17.574l35.872-35.985 c0.856-0.859,1.195-2.105,0.893-3.279c-0.303-1.174-1.202-2.102-2.367-2.44C237.244,0.76,231.886,0,226.489,0 c-15.249,0-29.574,5.946-40.337,16.744c-16.893,16.946-20.87,41.948-11.981,62.704l-43.515,43.514L86.118,78.424 l-20.367-35.13c-0.352-0.603-0.83-1.12-1.403-1.518L29.906,17.948c-1.899-1.318-4.467-1.086-6.1,0.547l-15.3,15.3 c-1.634,1.633-1.864,4.202-0.547,6.1l23.828,34.342c0.398,0.573,0.915,1.052,1.518,1.403l34.902,20.358l44.528,44.528 l-33.508,33.508c-7.016-3.017-14.633-4.613-22.497-4.613c-15.25,0-29.577,5.947-40.342,16.746 C1.931,201.025-3.551,222.602,2.319,242.592c0.341,1.163,1.271,2.06,2.446,2.359c1.174,0.298,2.42-0.044,3.276-0.903 l35.874-35.984c2.153,0.874,7.576,3.853,17.613,13.858c10.04,10.009,13.036,15.423,13.916,17.574l-35.872,35.985 c-0.856,0.859-1.195,2.105-0.893,3.279c0.303,1.174,1.202,2.102,2.367,2.439c5.17,1.5,10.528,2.261,15.926,2.261 c15.247,0,29.573-5.947,40.336-16.745c10.742-10.776,16.645-25.089,16.622-40.305c-0.012-7.841-1.609-15.433-4.617-22.424 l33.502-33.501l14.194,14.194l-9.677,9.677c-2.105,2.106-3.265,4.905-3.265,7.882c0,2.978,1.159,5.776,3.264,7.881 l68.364,68.363c2.105,2.105,4.903,3.264,7.88,3.264c2.977,0,5.776-1.159,7.882-3.264l37.036-37.037 c2.106-2.105,3.266-4.904,3.266-7.882c0-2.977-1.159-5.776-3.264-7.881L200.133,157.32z M224.331,254.164 c-2.437,2.438-6.386,2.438-8.821,0l-43.859-43.858c-2.436-2.435-2.436-6.384,0-8.821c2.436-2.436,6.385-2.436,8.821,0.002 l43.858,43.857C226.766,247.779,226.767,251.729,224.331,254.164z M244.177,234.318c-2.435,2.436-6.386,2.436-8.821,0 l-43.857-43.859c-2.436-2.435-2.436-6.385-0.001-8.82c2.436-2.436,6.386-2.436,8.821,0l43.858,43.859 C246.612,227.934,246.612,231.883,244.177,234.318z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-4xl font-extrabold text-sky-600 dark:text-sky-400 mb-4">{{ $mekanik['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-around text-center border-t border-slate-200 dark:border-slate-700 pt-3">
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-yellow-500">{{ $mekanik['pending'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-red-500">{{ $mekanik['belum_selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Belum Selesai</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-sky-500">{{ $mekanik['on_progress'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-green-500">{{ $mekanik['selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Elektrik -->
                    <a href="{{ route('maintenance.dashboard', ['keterangan' => 'Elektrik']) }}"
                        class="card-link group relative block p-6 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm shadow-md border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                        style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Electric </h2>
                                    <p class="text-slate-500 dark:text-slate-400">Electrical Reports </p>
                                </div>
                                <div class="p-2 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-4xl font-extrabold text-sky-600 dark:text-sky-400 mb-4">{{ $elektrik['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-around text-center border-t border-slate-200 dark:border-slate-700 pt-3">
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-yellow-500">{{ $elektrik['pending'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-red-500">{{ $elektrik['belum_selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Belum Selesai</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-sky-500">{{ $elektrik['on_progress'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-green-500">{{ $elektrik['selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Utility -->
                    <a href="{{ route('maintenance.dashboard', ['keterangan' => 'Utility']) }}"
                        class="card-link group relative block p-6 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm shadow-md border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                        style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Utility</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Utility Reports </p>
                                </div>
                                <div class="p-2 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-4xl font-extrabold text-sky-600 dark:text-sky-400 mb-4">{{ $utility['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-around text-center border-t border-slate-200 dark:border-slate-700 pt-3">
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-yellow-500">{{ $utility['pending'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-red-500">{{ $utility['belum_selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Belum Selesai</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-sky-500">{{ $utility['on_progress'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>


                                </div>
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-green-500">{{ $utility['selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Calibraty -->
                    <a href="{{ route('maintenance.dashboard', ['keterangan' => 'Calibraty']) }}"
                        class="card-link group relative block p-6 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm shadow-md border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                        style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Calibraty</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Calibration reports </p>
                                </div>
                                <div class="p-2 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-4xl font-extrabold text-sky-600 dark:text-sky-400 mb-6">{{ $calibraty['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-around text-center border-t border-slate-200 dark:border-slate-700 pt-3">
                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-yellow-500">{{ $calibraty['pending'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-red-500">{{ $calibraty['belum_selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Belum Selesai</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-sky-500">{{ $calibraty['on_progress'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>

                                <div class="stat-item">
                                    <p class="text-2xl font-bold text-green-500">{{ $calibraty['selesai'] }}</p>
                                    <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>


                <div class="mt-12 lg:mt-12 w-full" data-aos="fade-up" wire:poll.10s>
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">
                            Latest Report
                        </h3>
                    </div>

                    <div x-data="{
            swiper: null,
            init() {
                this.swiper = new Swiper(this.$refs.container, {
                    modules: [window.SwiperModules.Navigation, window.SwiperModules.Pagination, window.SwiperModules.Autoplay],
                    loop: {{ count($laporanTerbaru) > 2 ? 'true' : 'false' }},
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    spaceBetween: 16,
                    slidesPerView: 1,
                    breakpoints: {
                        768: { slidesPerView: 2, spaceBetween: 24 }, 
                        1024: { slidesPerView: 2, spaceBetween: 24 }, 
                        1280: { slidesPerView: 3, spaceBetween: 30 } 
                    },
                    pagination: {
                        el: this.$refs.pagination,
                        clickable: true,
                    },
                    navigation: {
                        nextEl: this.$refs.next,
                        prevEl: this.$refs.prev,
                    },
                });
            }
        }"
                        x-init="init()"
                        class="relative px-4">
                        <div class="swiper-container overflow-hidden" x-ref="container">
                            <div class="swiper-wrapper">

                                @forelse($laporanTerbaru as $laporan)
                                <div class="swiper-slide h-auto pb-8">
                                    <div class="report-card bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm shadow-lg border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-4 flex flex-col h-full hover:shadow-lg hover:shadow-sky-500/20 transition-shadow duration-300">

                                        <div class="flex-shrink-0 mb-3">
                                            @php $status = optional($laporan->maintenance)->status ?? 'Pending'; @endphp
                                            <div class="flex items-center justify-between">

                                                <div class="flex items-center gap-2 min-w-0">
                                                    @if($status == 'Pending')
                                                    <div class="w-8 h-8 rounded-full bg-yellow-100 dark:bg-yellow-500/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4 text-yellow-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    @elseif($status == 'Belum Selesai')
                                                    <div class="w-8 h-8 rounded-full bg-red-100 dark:bg-red-500/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4 text-red-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </div>

                                                    @elseif($status == 'On Progress')
                                                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.092 1.21-.138 2.43-.138 3.662s.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.092-1.21.138-2.43.138-3.662zM15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    </div>
                                                    @else
                                                    <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-500/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4 text-green-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    @endif
                                                    <p class="font-semibold text-slate-800 dark:text-slate-100 text-lg truncate">{{ $laporan->nama_mesin }}</p>
                                                </div>

                                                <div class="flex items-center gap-2 flex-shrink-0">
                                                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                                            @if($laporan->keterangan == 'Mekanik') bg-orange-100 text-orange-800 dark:bg-orange-900/50 dark:text-orange-300 @endif
                                            @if($laporan->keterangan == 'Elektrik') bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300 @endif
                                            @if($laporan->keterangan == 'Utility') bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-300 @endif
                                            @if($laporan->keterangan == 'Calibraty') bg-rose-100 text-rose-800 dark:bg-rose-900/50 dark:text-rose-300 @endif
                                            @if($laporan->keterangan == 'Battery') bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif
                                            @if($laporan->keterangan == 'Bahan bakar solar') bg-pink-100 text-pink-800 dark:bg-pink-900/50 dark:text-pink-300 @endif
                                        ">{{ $laporan->keterangan }}</span>

                                                    <span class="text-xs font-medium px-2 py-0.5 rounded-full
                                            @if($status == 'Pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300 @endif
                                            @if($status == 'Belum Selesai') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300 @endif
                                            @if($status == 'On Progress') bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300 @endif
                                            @if($status == 'Selesai') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300 @endif
                                        ">{{ $status }}</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="flex-grow">
                                            <p class="text-slate-600 dark:text-slate-300 mt-1 text-base line-clamp-2">{{ $laporan->uraian_kerusakan }}</p>
                                        </div>

                                        <div class="mt-3 pt-3 border-t border-slate-200/80 dark:border-slate-700/80">
                                            <p class="text-xs text-slate-400 dark:text-slate-500">{{ \Carbon\Carbon::parse($laporan->created_at)->diffForHumans() }} oleh {{ $laporan->nama_pelapor }}</p>
                                        </div>

                                    </div>
                                </div>
                                @empty
                                <div class="swiper-slide">
                                    <div class="text-center p-10 text-slate-500">Belum ada laporan terbaru.</div>
                                </div>
                                @endforelse

                            </div>
                        </div>

                        <div x-ref="prev" class="swiper-button-prev -left-2 text-blue-600 dark:text-teal-400 after:text-2xl font-extrabold hidden lg:flex"></div>
                        <div x-ref="next" class="swiper-button-next -right-2 text-blue-600 dark:text-teal-400 after:text-2xl font-extrabold hidden lg:flex"></div>
                        <div x-ref="pagination" class="swiper-pagination mt-4 !bottom-0"></div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('particle-background');
                const ctx = canvas.getContext('2d');
                let particlesArray;

                function setCanvasSize() {
                    const parent = canvas.parentElement;
                    canvas.width = parent.clientWidth;
                    canvas.height = parent.clientHeight;
                }

                const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                const particleColor = isDarkMode ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)';
                const lineColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

                // partikel
                class Particle {
                    constructor(x, y, directionX, directionY, size, color) {
                        this.x = x;
                        this.y = y;
                        this.directionX = directionX;
                        this.directionY = directionY;
                        this.size = size;
                        this.color = color;
                    }
                    draw() {
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
                        ctx.fillStyle = this.color;
                        ctx.fill();
                    }
                    update() {
                        if (this.x > canvas.width || this.x < 0) {
                            this.directionX = -this.directionX;
                        }
                        if (this.y > canvas.height || this.y < 0) {
                            this.directionY = -this.directionY;
                        }
                        this.x += this.directionX;
                        this.y += this.directionY;
                        this.draw();
                    }
                }

                // Loop animasi
                function animate() {
                    requestAnimationFrame(animate);
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    for (let i = 0; i < particlesArray.length; i++) {
                        particlesArray[i].update();
                    }
                    connect();
                }

                // Event listener untuk resize window
                window.addEventListener('resize', function() {
                    init();
                });


                init();
                animate();
            });
        </script>


</x-layouts.app>