/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            primary: {
                50: '#f6f6f6',
                100: '#e7e7e7',
                200: '#d1d1d1',
                300: '#b0b0b0',
                400: '#888888',
                500: '#6d6d6d',
                600: '#5d5d5d',
                700: '#4f4f4f',
                800: '#454545',
                900: '#3d3d3d',
                950: '#1D1C1A',
            },
            border: {
                purple: '#B026FF',
                cyan: '#00fefc',
            }
        },

        textColor: {
            purple: '#B026FF',
            white: '#fff',
            hover: '#6d6d6d',
            active: '#c6dbda',
            black: '#000',
            gray: '#A9A9A9',
        },

        extend: {},
    },
    plugins: [],
}