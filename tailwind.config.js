/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.{vue,js,ts,jsx,tsx,blade.php}",
    ],
  theme: {
    extend: {},
    container: {
        center: true,
    },
  },
    variants: {
        extend: {
            display: ["group-hover"],
        },
    },
  plugins: [],
}
