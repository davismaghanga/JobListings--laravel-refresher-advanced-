/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        colors:{
            "black":'#060606'
        },
        fontFamily:{
            "hanken-grotesk":["Hanken Grotesk", "sans-serif"]
        },
        fontSize:{
            "2xs":"0.625rem" //10px
        }
    },
  },
  plugins: [],
}
