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
                50: '#f5f8f8',
                100: '#e1ecec',
                200: '#c6dbda',
                300: '#9ec2c2',
                400: '#6fa1a1',
                500: '#538587',
                600: '#486f72',
                700: '#3f5c5f',
                800: '#394e51',
                900: '#354649',
            }
        },

        textColor: {
            white: '#fff',
            hover: '#9ec2c2',
            active: '#c6dbda',
        },

        extend: {},
    },
    plugins: [],
}