const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
   purge: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
   ],
   darkMode: 'class',
   mode: 'jit',
   theme: {
      extend: {
         fontFamily: {
            sans: ['Inter var', ...defaultTheme.fontFamily.sans],
         },
         colors: {
            rose: colors.rose,
            cyan: colors.cyan,
            fuchsia: colors.fuchsia,
            purple: colors.purple,
            yellow: colors.yellow,
            green: colors.green,
            emerald: colors.emerald,
            red: colors.red,
            white: colors.white,
            black: colors.black,
            gray: colors.coolGray,
            dark: {
               900: '#0c0d12',
               800: '#12141c',
               700: '#171923',
               600: '#252a37',
            }
         },
      },
   },
   variants: {
      extend: {},
   },
   plugins: [require('@tailwindcss/line-clamp')],
}
