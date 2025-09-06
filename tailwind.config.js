import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Baris ini akan mengaktifkan dark mode berbasis class
    darkMode: 'class',

    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js')
    ],

    content: [
        // File Blade dan JavaScript proyek 
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",

        // File-file dari paket TallStackUI
        './vendor/tallstackui/tallstackui/src/**/*.php',

        // File-file dari paket Livewire Datatable
        "./vendor/developerawam/livewire-datatable/resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                'jembo-blue': '#2D3D8B',
                'jembo-yellow': '#F7DF4B',
                'jembo-red': '#D83B36',
                'jembo-orange': '#E89D48',
            },
        },
    },

    plugins: [
        forms
    ],
};
