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

mix.js('resources/assets/cms/js/build.js', 'public/assets/cms/js')
    .styles([
        'resources/assets/cms/css/custom.css'
    ], 'public/assets/cms/css/style.css')
    .sass('resources/assets/cms/scss/build.scss', 'public/assets/cms/css');

mix.js('resources/assets/web/js/build.js', 'public/assets/web/js')
    .sass('resources/assets/web/scss/build.scss', 'public/assets/web/css')
    .copy('resources/assets/web/icons', 'public/assets/web/icons');