/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/views/**/*.js",
    "./resources/views/**/*.vue",
  ],
  theme: {
    fontFamily:{
      'sans': ['Jakarta Sans', 'sans-serif'],
    },
    extend: {
      colors:{
        white: '#FFFAFA',
        mainGreen:'#55D917',
        black:'#0C0C0C',
        green:{
          '1':'#caf3b7',
          '2':'#3C9A10'
        },
        grey:{
          1:'#e7e7e7'
        },
      }
    },

  },
  plugins: [],
}

