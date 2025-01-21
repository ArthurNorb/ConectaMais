/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            themeColor: '#22323F',
            themeColorDark: '#1a272e',
            themeColorLight: '#4a6c88'
        }
      },
    },
    plugins: [],
  }