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
          1:'#caf3b7'
        },
        grey:{
          1:'#F0F2F5'
        },
      }
    },
    
  },
  plugins: [],
}

