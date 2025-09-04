<div class="mt-16 lg:mt-20 w-full" data-aos="fade-up" wire:poll.10s>
    <div class="text-center mb-10">
        <h3 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">
            Laporan Terbaru
        </h3>
    </div>

    @if(!empty($laporanTerbaru) && $laporanTerbaru->isNotEmpty())
        
        <div x-data="{
                swiper: null,
                init() {
                    this.swiper = new Swiper(this.$refs.container, {
                        modules: [window.SwiperModules.Navigation, window.SwiperModules.Pagination, window.SwiperModules.Autoplay],
                        loop: {{ $laporanTerbaru->count() > 3 ? 'true' : 'false' }},
                        autoplay: { delay: 5000, disableOnInteraction: false },
                        spaceBetween: 16,
                        slidesPerView: 1,
                        breakpoints: {
                            640: { slidesPerView: 2, spaceBetween: 24 },
                            1024: { slidesPerView: 3, spaceBetween: 30 }
                        },
                        pagination: { el: this.$refs.pagination, clickable: true },
                        navigation: { nextEl: this.$refs.next, prevEl: this.$refs.prev },
                    });
                }
            }"
            x-init="init()"
            class="relative px-4"
            wire:ignore
        >
            <div class="swiper-container overflow-hidden" x-ref="container">
                <div class="swiper-wrapper">

                    @foreach($laporanTerbaru as $laporan)
                        <div class="swiper-slide h-auto pb-10">
                            <div class="report-card bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm shadow-lg border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-6 flex flex-col h-full hover:shadow-xl hover:shadow-blue-500/20 transition-shadow duration-300">
                                
                                <div class="flex-shrink-0 mb-4">
                                    @php $status = optional($laporan->maintenance)->status ?? 'Pending'; @endphp
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3 min-w-0">
                                            {{-- Ikon Status --}}
                                            @if($status == 'Pending')
                                            <div class="w-10 h-10 rounded-full bg-yellow-100 dark:bg-yellow-500/20 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            @elseif($status == 'Belum Selesai')
                                            <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-500/20 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </div>
                                            @elseif($status == 'On Progress') 
                                            <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M18 14H9"></path>
                                                </svg>
                                            </div>
                                            @else {{-- Status Selesai --}}
                                            <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-500/20 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            @endif
                                            <p class="font-semibold text-slate-800 dark:text-slate-100 text-lg truncate">{{ $laporan->nama_mesin }}</p>
                                        </div>

                                        <div class="flex items-center gap-2 flex-shrink-0">
                                            {{-- Label Keterangan/Kategori --}}
                                            <span class="text-xs font-medium px-2.5 py-1 rounded-full
                                                @if($laporan->keterangan == 'Mekanik') bg-orange-100 text-orange-800 dark:bg-orange-900/50 dark:text-orange-300 @endif {{-- <-- UBAH WARNA MEKANIK --}}
                                                @if($laporan->keterangan == 'Elektrik') bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300 @endif
                                                @if($laporan->keterangan == 'Utility') bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-300 @endif
                                                @if($laporan->keterangan == 'Calibraty') bg-rose-100 text-rose-800 dark:bg-rose-900/50 dark:text-rose-300 @endif
                                            ">{{ $laporan->keterangan }}</span>

                                            {{-- Label Status --}}
                                            <span class="text-xs font-medium px-2.5 py-1 rounded-full
                                                @if($status == 'Pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300 @endif
                                                @if($status == 'Belum Selesai') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300 @endif
                                                @if($status == 'On Progress') bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300 @endif {{-- <-- TAMBAH KONDISI INI --}}
                                                @if($status == 'Selesai') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300 @endif
                                            ">{{ $status }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow"><p class="text-slate-600 dark:text-slate-300 mt-2 text-base line-clamp-3">{{ $laporan->uraian_kerusakan }}</p></div>
                                <div class="mt-4 pt-4 border-t border-slate-200/80 dark:border-slate-700/80"><p class="text-xs text-slate-400 dark:text-slate-500">{{ \Carbon\Carbon::parse($laporan->created_at)->diffForHumans() }} oleh {{ $laporan->nama_pelapor }}</p></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div x-ref="prev" class="swiper-button-prev -left-2 text-blue-600 dark:text-teal-400 after:text-2xl font-extrabold hidden lg:flex"></div>
            <div x-ref="next" class="swiper-button-next -right-2 text-blue-600 dark:text-teal-400 after:text-2xl font-extrabold hidden lg:flex"></div>
            <div x-ref="pagination" class="swiper-pagination mt-4 !bottom-0"></div>
        </div>
    
    @else
        <div class="text-center p-10 text-slate-500 dark:text-slate-400">
            Belum ada laporan terbaru.
        </div>
    @endif

</div>