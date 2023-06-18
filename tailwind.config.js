const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'body-grey': '#FAFAFA',
                'pr-green': '#51B56D',
                'sec-green': '#00D163',
                'l-green': '#E0F2E5',
                'pr-purple': '#917AEB',
                'l-purple': '#E9E4FB'
            },
            backgroundImage: {

            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
