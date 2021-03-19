const mix = require('laravel-mix');

mix.postCss('resources/css/app.css', 'assets/css/app.css', [
	require('tailwindcss'),
	require('postcss-nested')
])
.options({
	processCssUrls: false
}).js('resources/js/app.js', 'assets/js/app.js');