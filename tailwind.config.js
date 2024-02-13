import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                display: ['Lora'],
            },
        },
    },

    plugins: [forms, require("daisyui")],

    daisyui: {
        themes: [
            {
                mytheme: {
                "primary": "#66BF60",
                "secondary": "#2FBFE7",
                "accent": "#CD76E9",
                "neutral": "#211C6A",
                "base-100": "#FEFBF6",
                },
            },
        ],
    },
};
