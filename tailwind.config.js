import defaultTheme from 'tailwindcss/defaultTheme';
<<<<<<< HEAD
=======
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
>>>>>>> 3a4de4d2bddbc89265a3d3762026aeb332fff18b

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
<<<<<<< HEAD
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
=======
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

>>>>>>> 3a4de4d2bddbc89265a3d3762026aeb332fff18b
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
<<<<<<< HEAD
    plugins: [],
=======

    plugins: [forms, typography],
>>>>>>> 3a4de4d2bddbc89265a3d3762026aeb332fff18b
};
