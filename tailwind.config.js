/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{php,html,js,jsx,ts,tsx,css}", // scan everything under project root
    "!./node_modules/**",                   // but skip node_modules
    "!./vendor/**"                          // skip vendor (if you use Composer)
  ],
  theme: {
    extend: {
      // you can add custom colors, fonts, spacing, etc. here
    },
  },
  plugins: [],
};