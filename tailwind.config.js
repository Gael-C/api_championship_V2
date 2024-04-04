import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                space_regular: ['Space-mono', 'monospace', 400,  ...defaultTheme.fontFamily.sans],
            },
            colors: {
                bleu: '#3B88C3',
                gris: '#ccd6dd',
                gris_clair:'#e1e8ed'
            },
        },
    },

    plugins: [forms],
};
