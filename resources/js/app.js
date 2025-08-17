import './bootstrap';

// Impor Livewire
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

// Impor SweetAlert2
import Swal from 'sweetalert2';

// Jadikan Swal bisa diakses secara global
window.Swal = Swal;

// Mulai Livewire
Livewire.start();

// Listener untuk event Livewire
document.addEventListener('livewire:init', () => {
    Livewire.on('laporan-sukses', (event) => {
        Swal.fire({
            title: 'Berhasil!',
            text: event[0],
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2D3D8B'
        });
    });
});
