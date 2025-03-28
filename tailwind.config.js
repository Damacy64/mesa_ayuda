import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'afac-gray-low': '#95A8BE',
                'afac-blue': '#003764',
                'afac-golden': '#BC955C',
                'afac-gray': '#D9D9D9',
                'afac-link': '#13A6DC',
                'afac-sky-blue': '#95A8BE',
            },
        },
    },

    plugins: [forms, typography],
};
