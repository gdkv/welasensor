const mix = require('laravel-mix');

mix.js([
    'resources/js/charts.js',
    'resources/js/scrolls.js',
    'resources/js/cookie.js',
    'resources/js/mask.js',
    'resources/js/slide.js',
    'resources/js/tips.js',
    'resources/js/select.js',
    'resources/js/accordion.js',
    'resources/js/password.js',
    'resources/js/app.js',
], 'public/assets/js/app.js');

mix.sass('resources/sass/app.scss', 'public/assets/css');
