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
        fontSize: {
            sm: "1rem",
            md: "1.4rem",
            base: "1.6rem",
            lg: "1.8rem",
            xl: "2rem",
            "2xl": "4rem",
            "3xl": "6rem",
            "4xl": "8rem",
            "5xl": "10rem",
        },
        extend: {},
    },
    plugins: [],
};
