/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./index.php",
    "./front/**/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        title: ["Poppins", "sans-serif"],
      },

    },
  },
  plugins: [],
}

