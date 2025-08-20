// Import dependensi dasar
import './bootstrap';
import Swal from 'sweetalert2';

// Import dan inisialisasi Livewire
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

// --- Konfigurasi Global ---
// Jadikan Swal bisa diakses secara global
window.Swal = Swal;

// --- Inisialisasi Aplikasi ---
// Mulai Livewire
Livewire.start();

// --- Event Listeners ---
// Listener untuk menampilkan notifikasi sukses dari Livewire
Livewire.on('laporan-sukses', (event) => {
    Swal.fire({
        title: 'Berhasil!',
        text: event.message || 'Laporan berhasil diproses.',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#2D3D8B'
    });
});