/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            xl: { max: '1440px' },
            lg: { max: '1024px' },
            md: { max: '768px' },
            sm: { max: '548px' }
        },
        extend: {},
    },
    plugins: [],
};
