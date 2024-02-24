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
            primaryColor: "#02AB82",
            secondaryColor: "#92D2C8",
            lightGray: "#BCBEC0",
            darkBlue: "#3E5366",
            darkGreen: "#009680",
            oceanBlue: "#165BAA",
            orange: "#FF9900",
            green: "#1DAF90",
            red: "#FF0000"
          },
            fontFamily: {
                manjari: ["Manjari", "sans-serif"],
                roboto: ["Roboto", "sans-serif"],
                montserrat: ["Montserrat", "sans-serif"],
                kanit: ["Kanit", "sans-serif"],
            },
        },
    },
    plugins: [],
};
