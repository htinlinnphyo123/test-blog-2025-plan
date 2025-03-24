/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.css",
        "./node_modules/flowbite/**/*.js",
        'node_modules/preline/dist/*.js',
    ],
    safelist: [
        ...[...Array(10).keys()].flatMap(i => [`top-[${i*10}%]`, `left-[${i*10}%]`])
    ],
    theme: {
        extend: {
                colors: {
                'theme' : '#141b4d',
                'secondary' : '#dd0000',
                }
            },
            keyframes: {
                slideIn: {
                "0%": { opacity: 0.5, transform: "translateY(20px)" },
                "100%": { opacity: 1, transform: "translateY(0)" }
                }
            },
            animation: {
                slideIn: "slideIn .25s ease-in-out forwards"
            }
    },
    darkMode: "class",
    plugins: [ require('flowbite/plugin')({
        charts: true,
    }),require('preline/plugin'),
    ],
};

