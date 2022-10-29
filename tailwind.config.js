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
      primary: "#23569F",
      primarylight: "#23569Fcc",
    },
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
