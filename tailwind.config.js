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
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'app-green': '#0ab463',
                'app-grey': '#ededed',
                'app-border': '#c4c4c4',
                'app-gray-2': '#383838',
                'app-gainsboro': '#DCDCDC',
                'app-blue': '#0094ff',
            },
        },
    },

    plugins: [forms],
};
