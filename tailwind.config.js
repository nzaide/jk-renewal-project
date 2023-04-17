/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.pug",
    "./resources/**/*.html"
  ],
  theme: {
    extend: {
      screens: {
        'xlg-screen': {'max': '1588px'},
        'lg-screen': {'max': '1315px'},
        // => @media (max-width: 1315px) { ... }
        'md-screen': {'max': '915px'},
        // => @media (max-width: 915px) { ... }
        'sp': {'max': '767px'},
        // => @media (max-width: 767px) { ... }
        'sml-screen': {'max': '572px'},
        // => @media (max-width: 572px) { ... }
        'xm-screen': {'max': '400px'},
        // => @media (max-width: 400px) { ... }
      },
      fontFamily: {
        'noto': 'Noto Sans JP, sans-serif',
        'helvetica': 'HelveticaNeueRegular, sans-serif',
        'meiryo': 'meiryo, sans-serif',
      },
      colors: {
        'primary-gray': '#646464',
        'primary-blue': '#007BFF',
        'link': '#0088D0',
        'grey': '#707070',
        'primary-red': '#DC3545',
        'primary-orange': '#d65327',
        'primary-green': '#28A745'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}