import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Arial", ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                "col-6": "50%",
                "col-5": "41.6666%",
                "col-4": "33.3333%",
                "col-3": "25%",
                "col-2": "16.6666%",
                "col-1": "8.3333%",
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["business", "light", "cupcake"],
    },
};
