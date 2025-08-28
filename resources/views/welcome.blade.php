<x-layouts.app>
    @section('title', 'Home - Sistem Laporan Mesin')

    {{-- CSS untuk Desain Kartu Glassmorphism Baru --}}
    <style>
        .card-grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
            padding: 1rem;
            width: 100%;
            max-width: 1100px;
            margin: auto;
            justify-items: center;
        }

        @media (max-width: 768px) {
            .card-grid-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        .card {
            position: relative;
            width: 450px;
            height: 280px;
            max-width: 100%;
            border-radius: 14px;
            z-index: 10;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
            transition: all 0.3s ease;
            
            /* Efek Glassmorphism */
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px 0 rgba(0, 0, 0, 0.15);
        }

        .dark .card {
            background: rgba(30, 41, 59, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card .content {
            position: relative;
            z-index: 3;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            border-bottom: 1px solid rgba(100, 116, 139, 0.2);
            padding-bottom: 0.75rem;
        }

        .card .header h2 {
            font-size: 1.875rem;
            font-weight: 700;
        }

        .card .header .total {
            font-size: 2.25rem;
            font-weight: 800;
        }

        .card .stats {
            margin-top: 1.5rem;
            width: 100%;
            display: flex;
            justify-content: space-around;
            text-align: center;
            flex-grow: 1;
            align-items: center;
        }

        .card .stats .stat-item p:first-child {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
        }

        .card .stats .stat-item p:last-child {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .dark .card .stats .stat-item p:last-child {
            color: #94a3b8;
        }

        /* PERBAIKAN: Mengubah .corner-symbol menjadi bentuk vektor */
        .card .corner-symbol {
            position: absolute;
            top: -10px; /* Disesuaikan agar pas */
            left: -10px; /* Disesuaikan agar pas */
            width: 60px; /* Ukuran diperbesar */
            height: 60px;
            z-index: 4;
        }

        .corner-symbol .vector-shape {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: var(--symbol-color);
            clip-path: path('M 60 30 C 60 46.56 46.56 60 30 60 L 10 60 C 4.48 60 0 55.52 0 50 L 0 10 C 0 4.48 4.48 0 10 0 L 30 0 C 46.56 0 60 13.44 60 30 Z');
            box-shadow: 0 0 10px var(--symbol-color);
        }

        .corner-symbol .letter {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            padding-right: 10px; /* Disesuaikan agar huruf di tengah bentuk */
            padding-bottom: 10px;
        }

        /* Warna spesifik untuk setiap kartu */
        .card-m { color: #0284c7; --symbol-color: #38bdf8; } .dark .card-m { color: #38bdf8; }
        .card-e { color: #16a34a; --symbol-color: #4ade80; } .dark .card-e { color: #4ade80; }
        .card-u { color: #f97316; --symbol-color: #fb923c; } .dark .card-u { color: #fb923c; }
        .card-c { color: #7c3aed; --symbol-color: #a78bfa; } .dark .card-c { color: #a78bfa; }
    </style>

    <div class="min-h-[calc(100vh-4rem)] flex flex-col items-center justify-start p-6 pt-12">
        {{-- Bagian header --}}
        <div class="text-center mb-12">
            <h1 class="text-5xl lg:text-5xl font-bold tracking-tight mb-4 
                       bg-gradient-to-r from-blue-600 to-teal-500 
                       dark:from-blue-500 dark:to-teal-300 
                       bg-clip-text text-transparent">
                Work Of Maintenance
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 max-w-3xl mx-auto leading-relaxed">
                Lihat ringkasan laporan kerusakan mesin.
            </p>
        </div>

        <div class="card-grid-container">
            {{-- Card Mekanik --}}
            <a href="{{ route('maintenance.dashboard') }}" class="card card-m">
                <div class="corner-symbol">
                    <div class="vector-shape"></div>
                    <div class="letter">M</div>
                </div>
                <div class="content">
                    <div class="header">
                        <h2>Mekanik</h2>
                        <p class="total">{{ $mekanik['total'] }}</p>
                    </div>
                    <div class="stats">
                        <div class="stat-item">
                            <p>{{ $mekanik['pending'] }}</p>
                            <p>Pending</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $mekanik['belum_selesai'] }}</p>
                            <p>On Progress</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $mekanik['selesai'] }}</p>
                            <p>Selesai</p>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Card Elektrik --}}
            <a href="{{ route('maintenance.dashboard') }}" class="card card-e">
                <div class="corner-symbol">
                    <div class="vector-shape"></div>
                    <div class="letter">E</div>
                </div>
                <div class="content">
                    <div class="header">
                        <h2>Elektrik</h2>
                        <p class="total">{{ $elektrik['total'] }}</p>
                    </div>
                    <div class="stats">
                        <div class="stat-item">
                            <p>{{ $elektrik['pending'] }}</p>
                            <p>Pending</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $elektrik['belum_selesai'] }}</p>
                            <p>On Progress</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $elektrik['selesai'] }}</p>
                            <p>Selesai</p>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Card Utility --}}
            <a href="{{ route('maintenance.dashboard') }}" class="card card-u">
                <div class="corner-symbol">
                    <div class="vector-shape"></div>
                    <div class="letter">U</div>
                </div>
                <div class="content">
                    <div class="header">
                        <h2>Utility</h2>
                        <p class="total">{{ $utility['total'] }}</p>
                    </div>
                    <div class="stats">
                        <div class="stat-item">
                            <p>{{ $utility['pending'] }}</p>
                            <p>Pending</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $utility['belum_selesai'] }}</p>
                            <p>On Progress</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $utility['selesai'] }}</p>
                            <p>Selesai</p>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Card Calibraty --}}
            <a href="{{ route('maintenance.dashboard') }}" class="card card-c">
                <div class="corner-symbol">
                    <div class="vector-shape"></div>
                    <div class="letter">C</div>
                </div>
                <div class="content">
                    <div class="header">
                        <h2>Calibraty</h2>
                        <p class="total">{{ $calibraty['total'] }}</p>
                    </div>
                    <div class="stats">
                        <div class="stat-item">
                            <p>{{ $calibraty['pending'] }}</p>
                            <p>Pending</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $calibraty['belum_selesai'] }}</p>
                            <p>On Progress</p>
                        </div>
                        <div class="stat-item">
                            <p>{{ $calibraty['selesai'] }}</p>
                            <p>Selesai</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
