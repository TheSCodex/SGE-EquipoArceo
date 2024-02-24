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
        primaryColor: "#000045",
        secondaryColor: "#fbf5e9",
      }
    },
  },
  plugins: [],
}