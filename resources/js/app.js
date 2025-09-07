import './bootstrap';

// Impor SweetAlert2 untuk notifikasi
import Swal from 'sweetalert2';

import { tsParticles } from "tsparticles-engine";
import { loadSlim } from "tsparticles-slim"; 
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Swiper = Swiper;
window.SwiperModules = { Navigation, Pagination, Autoplay };

// Jadikan Swal bisa diakses secara global
window.Swal = Swal;

// Listener untuk event notifikasi dari Livewire
document.addEventListener('livewire:init', () => {
    Livewire.on('laporan-sukses', (event) => {
        const message = Array.isArray(event) ? event[0] : event;

        //dark mode
        const isDarkMode = document.documentElement.classList.contains('dark');

        Swal.fire({
            title: 'Berhasil!',
            text: message,
            icon: 'success',
            background: isDarkMode ? '#1f2937' : '#fff', 
            color: isDarkMode ? '#f3f4f6' : '#111827',     
            confirmButtonText: 'OK',
            confirmButtonColor: '#2D3D8B'
        });
    });
});

// Inisialisasi tsParticles setelah halaman dimuat
document.addEventListener('DOMContentLoaded', (event) => {
    // Fungsi async untuk memuat partikel
    async function loadParticles(options) {
        await loadSlim(tsParticles);
        await tsParticles.load({ id: "tsparticles", options });
    }

    // Konfigurasi partikel
    const particleOptions = {
        background: {
            color: { value: "transparent" }
        },
        fpsLimit: 60,
        interactivity: {
            events: {
                onHover: { enable: true, mode: "repulse" },
                onClick: { enable: true, mode: "push" }
            },
            modes: {
                repulse: { distance: 100, duration: 0.4 },
                push: { quantity: 4 }
            }
        },
        particles: {
            color: { value: "#056df5ff" },
            links: {
                color: "#006effff",
                distance: 150,
                enable: true,
                opacity: 0.7,
                width: 1
            },
            move: {
                direction: "none",
                enable: true,
                outModes: "out",
                random: false,
                speed: 1,
                straight: false
            },
            number: {
                density: { enable: true },
                value: 80
            },
            opacity: { value: 0.3 },
            shape: { type: "circle" },
            size: { value: { min: 1, max: 3 } }
        },
        detectRetina: true
    };

    // Panggil fungsi untuk memuat partikel
    loadParticles(particleOptions);
});

 // 1. Pilih semua elemen kartu laporan yang ingin dianimasikan
    const reportCards = document.querySelectorAll('.water-flow-item');

    // 2. Loop melalui setiap kartu dan terapkan animasi secara langsung
    reportCards.forEach((card, index) => {
        // Sembunyikan kartu terlebih dahulu agar tidak "flash" sebelum animasi dimulai
        card.style.opacity = 0;

        // Definisikan keyframes animasi (dari mana ke mana)
        const keyframes = [
            { 
                opacity: 0, 
                transform: 'translateY(40px) translateX(-15px)' 
            }, // Posisi awal
            { 
                opacity: 1, 
                transform: 'translateY(0) translateX(0)' 
            }  // Posisi akhir
        ];

        // Definisikan opsi animasi (durasi, easing, dan delay)
        const options = {
            duration: 800, // Durasi animasi 0.8 detik
            easing: 'cubic-bezier(0.25, 0.8, 0.25, 1)', // Easing function untuk efek halus
            delay: index * 200, // Delay 200ms per kartu untuk efek mengalir
            fill: 'forwards' // Memastikan elemen tetap di posisi akhir setelah animasi selesai
        };

        // 3. Jalankan animasi menggunakan Web Animations API
        card.animate(keyframes, options);
    });

