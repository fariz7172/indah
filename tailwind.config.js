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
                // New Futuristic Color Palette
                'mint': {
                    DEFAULT: '#F0FFDF',
                    50: '#FEFFFE',
                    100: '#FBFFF0',
                    200: '#F0FFDF',
                    300: '#E5FFCE',
                    400: '#DAFFBD',
                },
                'electric-purple': {
                    DEFAULT: '#B153D7',
                    50: '#F3E5FB',
                    100: '#E6CCF7',
                    200: '#D399EF',
                    300: '#C066E7',
                    400: '#B153D7',
                    500: '#9933C2',
                    600: '#7A299B',
                },
                'hot-pink': {
                    DEFAULT: '#F375C2',
                    50: '#FEF0F8',
                    100: '#FDE0F1',
                    200: '#FBC2E4',
                    300: '#F9A3D6',
                    400: '#F68CC9',
                    500: '#F375C2',
                    600: '#F05EBB',
                },
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'glow': 'glow 2s ease-in-out infinite alternate',
                'wave': 'wave 10s linear infinite',
                'shimmer': 'shimmer 2.5s linear infinite',
                'gradient': 'gradient 8s ease infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                glow: {
                    '0%': { boxShadow: '0 0 20px rgba(177, 83, 215, 0.5)' },
                    '100%': { boxShadow: '0 0 30px rgba(243, 117, 194, 0.8)' },
                },
                wave: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-1000px 0' },
                    '100%': { backgroundPosition: '1000px 0' },
                },
                gradient: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
            },
        },
    },
    plugins: [],
}
