import './bootstrap';

// Impor SweetAlert2 untuk notifikasi
import Swal from 'sweetalert2';

import { tsParticles } from "tsparticles-engine";
import { loadSlim } from "tsparticles-slim"; 

// Jadikan Swal bisa diakses secara global
window.Swal = Swal;

// Listener untuk event notifikasi dari Livewire
document.addEventListener('livewire:init', () => {
    Livewire.on('laporan-sukses', (event) => {
        const message = Array.isArray(event) ? event[0] : event;

        Swal.fire({
            title: 'Berhasil!',
            text: message,
            icon: 'success',
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
