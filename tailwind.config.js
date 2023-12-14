/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [

    "./vendor/ramonrietdijk/livewire-tables/resources/**/*.blade.php",
    './resources/views/vehicles/*.blade.php',
  ],
  theme: {
    container: {
      center: true,
    },
    extend: {},
  },

  plugins: [],
}

