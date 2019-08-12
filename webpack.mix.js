let mix = require('laravel-mix');
require('laravel-mix-sri');

mix.sass('resources/assets/scss/app.scss', 'public/css/app.min.css');
