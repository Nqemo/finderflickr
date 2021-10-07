module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    // Forced to use these colors
    colors: {
      'green-mondo': '#9bc00f',
      'green2-mondo': '#284910',
      'grey-mondo': '#676767',
      'white-mondo': '#f4f4f4',
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
