const mix = require('laravel-mix');

// mix.extract([
//     'perfect-scrollbar',
//     'imask',
//     'js-cookie',
//     'slideout',
//     'tippy.js',
//     'tippy.js/dist/tippy.css',
//     'tippy.js/themes/light.css',
//     'chart.js'
// ]);


mix.js(
        'resources/js/app.js',
        // 'resources/js/charts.js',
        // 'resources/js/scrolls.js',
        // 'resources/js/cookie.js',
        // 'resources/js/mask.js',
        // 'resources/js/slide.js',
        // 'resources/js/tips.js',
        // 'resources/js/misc.js',
    'public/assets/js/');

mix.sass('resources/sass/app.scss', 'public/assets/css');
