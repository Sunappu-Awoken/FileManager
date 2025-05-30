/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',                      // if you use Vue
    './vendor/unisharp/laravel-filemanager/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#123456',   // ← your brand’s primary color
        accent:  '#abcdef',   // ← your accent color
        neutral: '#f4f4f4',   // ← neutral background
      },
    },
  },
  plugins: [],
}
