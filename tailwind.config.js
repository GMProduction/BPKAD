/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    colors: {
      primary: "#ff4400",
      primarylight: "#23569Fcc",
    },
    extend: {fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },},
  },
  plugins: [
      require("flowbite/plugin"),
      require('@tailwindcss/line-clamp'),
  ],
};
