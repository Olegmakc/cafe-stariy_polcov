const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
	.sass('resources/sass/admin.scss', 'public/css/admin')
	.postCss("resources/css/app.css", "public/css", [
		require("tailwindcss"),
	]);
