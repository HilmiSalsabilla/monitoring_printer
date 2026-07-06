/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './application/views/**/*.php',
  ],
  safelist: [
    // These are toggled by application/assets/js/app.js via plain
    // classList calls rather than appearing verbatim in a view file,
    // so Tailwind's content scanner would otherwise purge them.
    'hidden',
    '-translate-x-full',
    'translate-x-0',
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#eef4ff',
          100: '#d9e6ff',
          200: '#b3ccff',
          300: '#80adff',
          400: '#4d8bff',
          500: '#2668f5',
          600: '#194fd1',
          700: '#153da3',
          800: '#142f79',
          900: '#101f4d',
        },
      },
      fontFamily: {
        sans: ['"Inter"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};
