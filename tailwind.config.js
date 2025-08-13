/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
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
    plugins: [],
}