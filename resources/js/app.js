import './bootstrap';
import Swal from 'sweetalert2';
window.Swal = Swal;

document.addEventListener('DOMContentLoaded', () => {

    // Temukan semua elemen yang ingin kita beri efek 'mengangkat'
    // Kita akan menggunakan class 'lift-effect' untuk menandainya
    const liftableElements = document.querySelectorAll('.lift-effect');

    // Terapkan efek pada setiap elemen yang ditemukan
    liftableElements.forEach(element => {

        // Atur properti transisi agar animasinya halus
        element.style.transition = 'transform 0.3s ease-out, box-shadow 0.3s ease-out';

        // Saat mouse masuk ke area elemen
        element.addEventListener('mouseenter', () => {
            // Angkat elemen sedikit ke atas
            element.style.transform = 'translateY(-5px)';
            // Tambahkan bayangan yang lebih menonjol untuk memperkuat efek 3D
            element.style.boxShadow = '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)';
        });

        // Saat mouse keluar dari area elemen
        element.addEventListener('mouseleave', () => {
            // Kembalikan elemen ke posisi semula
            element.style.transform = 'translateY(0px)';
            // Kembalikan bayangan ke keadaan semula (menggunakan gaya dari kelas Tailwind)
            element.style.boxShadow = '';
        });

    });

});
