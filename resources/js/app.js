import './bootstrap';

// Impor Alpine.js (ini akan menjadi satu-satunya sumber Alpine)
import Alpine from 'alpinejs';

// Impor Livewire
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

// Impor SweetAlert2
import Swal from 'sweetalert2';

// Jadikan Swal bisa diakses secara global jika dibutuhkan di tempat lain
window.Swal = Swal;

// Mulai Livewire dengan Alpine sebagai intinya
Livewire.start();

// =================================================================
// "PENDENGAR SINYAL" YANG BARU DAN BENAR
// =================================================================
document.addEventListener('livewire:init', () => {
    // Mendengarkan event 'laporan-sukses' yang dikirim dari backend
    Livewire.on('laporan-sukses', (event) => {
        Swal.fire({
            title: 'Berhasil!',
            text: event[0], // Mengambil pesan dari array yang diterima
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2D3D8B' // Warna jembo-blue
        });
    });
});