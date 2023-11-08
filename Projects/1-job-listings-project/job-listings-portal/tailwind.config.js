import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["League Spartan", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "hsl(180, 29%, 50%)",
                secondary: "hsl(180, 14%, 20%)",
                light: "hsl(180, 8%, 52%)",
            },
        },
    },

    plugins: [forms],
};
