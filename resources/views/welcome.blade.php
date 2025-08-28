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

    <!-- Kontainer utama dengan posisi relatif untuk layering -->
    <div class="relative min-h-[calc(100vh-4rem)] w-full overflow-hidden">
        <!-- Canvas untuk Latar Belakang Partikel -->
        <canvas id="particle-background" class="absolute top-0 left-0 w-full h-full z-0"></canvas>

        <!-- Kontainer Konten Utama -->
        <div class="relative z-10 flex flex-col items-center justify-center w-full min-h-[calc(100vh-4rem)] p-4 sm:p-6 lg:p-8">
            
            <div class="w-full max-w-7xl mx-auto">
                <!-- Bagian Header -->
                <div class="text-center mb-10 lg:mb-16" data-aos="fade-down">
                    <h1 class="text-5xl lg:text-5xl font-bold tracking-tight mb-4 

                       bg-gradient-to-r from-blue-600 to-teal-500 

                       dark:from-blue-500 dark:to-teal-300 

                       bg-clip-text text-transparent">

                        Work Of Maintenance
                    </h1>
                    <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto leading-relaxed">
                        Ringkasan laporan kerusakan dan pemeliharaan mesin secara real-time.
                    </p>
                </div>

                <!-- Grid untuk Kartu Statistik -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 xl:gap-12" data-aos="fade-up" data-aos-delay="200">

                    <!-- Card Mekanik -->
                    <a href="{{ route('maintenance.dashboard') }}" 
                       class="card-link group relative block p-8 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                       style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Mekanik</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Report Mekanik</p>
                                </div>
                                <div class="p-3 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-5xl font-extrabold text-slate-900 dark:text-white mb-6">{{ $mekanik['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-between text-center border-t border-slate-200 dark:border-slate-700 pt-4">
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-yellow-500">{{ $mekanik['pending'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-blue-500">{{ $mekanik['belum_selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-green-500">{{ $mekanik['selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Elektrik -->
                    <a href="{{ route('maintenance.dashboard') }}" 
                       class="card-link group relative block p-8 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                       style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Elektrik</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Report Elektrik</p>
                                </div>
                                <div class="p-3 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-5xl font-extrabold text-slate-900 dark:text-white mb-6">{{ $elektrik['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-between text-center border-t border-slate-200 dark:border-slate-700 pt-4">
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-yellow-500">{{ $elektrik['pending'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-blue-500">{{ $elektrik['belum_selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-green-500">{{ $elektrik['selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Utility -->
                    <a href="{{ route('maintenance.dashboard') }}" 
                       class="card-link group relative block p-8 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                       style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Utility</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Report Utility</p>
                                </div>
                                <div class="p-3 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-5xl font-extrabold text-slate-900 dark:text-white mb-6">{{ $utility['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-between text-center border-t border-slate-200 dark:border-slate-700 pt-4">
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-yellow-500">{{ $utility['pending'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-blue-500">{{ $utility['belum_selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-green-500">{{ $utility['selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Card Calibraty -->
                    <a href="{{ route('maintenance.dashboard') }}" 
                       class="card-link group relative block p-8 rounded-3xl overflow-hidden bg-white/70 dark:bg-slate-800/70 backdrop-blur-sm border border-slate-200 dark:border-slate-700 transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20"
                       style="--glow-color: #22d3ee;">
                        <div class="glow-effect absolute inset-0"></div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-500 dark:to-teal-300 bg-clip-text text-transparent">Calibraty</h2>
                                    <p class="text-slate-500 dark:text-slate-400">Report Kalibrasi</p>
                                </div>
                                <div class="p-3 rounded-full bg-sky-500/10 dark:bg-sky-500/20 text-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-5xl font-extrabold text-slate-900 dark:text-white mb-6">{{ $calibraty['total'] }} <span class="text-lg font-medium text-slate-500 dark:text-slate-400">Total Laporan</span></div>
                            <div class="flex justify-between text-center border-t border-slate-200 dark:border-slate-700 pt-4">
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-yellow-500">{{ $calibraty['pending'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Pending</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-blue-500">{{ $calibraty['belum_selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">On Progress</p>
                                </div>
                                <div class="stat-item">
                                    <p class="text-3xl font-bold text-green-500">{{ $calibraty['selesai'] }}</p>
                                    <p class="text-sm uppercase tracking-wider text-slate-500 dark:text-slate-400">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('particle-background');
            const ctx = canvas.getContext('2d');
            let particlesArray;

            // Sesuaikan ukuran canvas dengan parent container
            function setCanvasSize() {
                const parent = canvas.parentElement;
                canvas.width = parent.clientWidth;
                canvas.height = parent.clientHeight;
            }

            // Cek preferensi tema gelap
            const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const particleColor = isDarkMode ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)';
            const lineColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

            // Buat partikel
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

            // Inisialisasi partikel
            function init() {
                setCanvasSize();
                particlesArray = [];
                let numberOfParticles = (canvas.height * canvas.width) / 9000;
                for (let i = 0; i < numberOfParticles; i++) {
                    let size = (Math.random() * 2) + 1;
                    let x = (Math.random() * ((canvas.width - size * 2) - (size * 2)) + size * 2);
                    let y = (Math.random() * ((canvas.height - size * 2) - (size * 2)) + size * 2);
                    let directionX = (Math.random() * .4) - .2;
                    let directionY = (Math.random() * .4) - .2;
                    particlesArray.push(new Particle(x, y, directionX, directionY, size, particleColor));
                }
            }

            // Hubungkan partikel dengan garis
            function connect() {
                let opacityValue = 1;
                for (let a = 0; a < particlesArray.length; a++) {
                    for (let b = a; b < particlesArray.length; b++) {
                        let distance = ((particlesArray[a].x - particlesArray[b].x) * (particlesArray[a].x - particlesArray[b].x))
                                     + ((particlesArray[a].y - particlesArray[b].y) * (particlesArray[a].y - particlesArray[b].y));
                        if (distance < (canvas.width/7) * (canvas.height/7)) {
                            opacityValue = 1 - (distance/20000);
                            ctx.strokeStyle = lineColor.replace('0.1', opacityValue);
                            ctx.lineWidth = 1;
                            ctx.beginPath();
                            ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                            ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                            ctx.stroke();
                        }
                    }
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

            // Jalankan
            init();
            animate();
        });
    </script> --}}
    
</x-layouts.app>