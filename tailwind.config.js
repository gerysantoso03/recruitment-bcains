/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js"),
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Http/Livewire/**/*Table.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
    ],
    theme: {
        screens: {
            xl: { max: '1440px' },
            lg: { max: '1024px' },
            md: { max: '768px' },
            sm: { max: '548px' }
        },
        fontSize: {
            sm: "1.2rem",
            md: "1.4rem",
            base: "1.8rem",
            lg: "2rem",
            xl: "2.4rem",
            "2xl": "2.8rem",
            "3xl": "4rem",
            "4xl": "6rem",
            "5xl": "8rem",
        },
        extend: {},
    },
    plugins: [],
};
