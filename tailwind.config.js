const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                dark: {
                    900: '#0c0d12',
                    800: '#12141c',
                    700: '#171923',
                    600: '#252a37',
                }
            },
            lineHeight: {
                tiny: '14px'
            },
            letterSpacing: {
                little: '0.05rem'
            },
            boxShadow: {
                'cyan-md': 'box-shadow: 0px 0px 4px 2.5px rgba(103, 232, 249, 0.15);'
            },
            lineClamp: {
                15: '15',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require('@tailwindcss/line-clamp'), require('tailwind-scrollbar')],
}
