const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/vendor.bundle.base.js', 'public/assets/js')
    .js('resources/js/misc.js', 'public/assets/js')
    .js('resources/js/app.js', 'public/assets/js');


mix.sass('resources/sass/vendor.bundle.base.scss', 'public/assets/css')
    .sass('resources/sass/vendor.bundle.addons.scss', 'public/assets/css')
    .sass('resources/sass/materialdesignicons.min.scss', 'public/assets/css')
    .sass('resources/sass/style.scss', 'public/assets/css')
    .sass('resources/sass/app.scss', 'public/assets/css');
