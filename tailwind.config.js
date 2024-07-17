/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/views/**/*.js",
    "./resources/views/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        white:{
          1: '#FFFAFA'
        },
        mainGreen:{
          1:'#55D917'
        },
        black:{
          1:'#0c0c0c'
        },
        green:{
          1:'#caf3b7'
        },
        grey:{
          1:'#e7e7e7'
        },
      }
    },
    
  },
  plugins: [],
}

