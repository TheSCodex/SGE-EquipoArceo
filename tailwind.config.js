import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                primaryColor: "#02AB82",
                secondaryColor: "#92D2C8",
                lightGray: "#BCBEC0",
                darkBlue: "#3E5366",
                darkGreen: "#009680",
                oceanBlue: "#165BAA",
                orange: "#FF9900",
                green: "#09AD60",
                red: "#FF0000"
            },
            fontFamily: {
                manjari: ["Manjari", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
                montserrat: ["Montserrat", "sans-serif"],
                kanit: ["Kanit", "sans-serif"],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
