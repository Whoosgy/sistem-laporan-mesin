import forms from '@tailwindcss/forms'; 
/** @type {import('tailwindcss').Config} */
export default {
    presets: [ 
        require('./vendor/tallstackui/tallstackui/tailwind.config.js') 
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue", // Tambahkan ini untuk jaga-jaga
        './vendor/tallstackui/tallstackui/src/**/*.php', 
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
}