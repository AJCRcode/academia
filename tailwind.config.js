import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            textShadow: {
                'sm': '1px 1px 5px rgba(255, 255, 255, 0.25)',
                'md': '2px 2px 4px rgba(255, 255, 255, 0.5)',
                'lg': '3px 3px 6px rgba(255, 255, 255, 0.5)',
                'xl': '4px 4px 8px rgba(255, 255, 255, 0.5)',
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        require('tailwindcss-textshadow'),
    ],
};
