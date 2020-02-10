const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
	.sass('resources/sass/admin.sass', 'public/css')
    .sass('resources/sass/site.sass', 'public/css')