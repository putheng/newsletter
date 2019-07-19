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

mix.scripts([
    './resources/js/vendors/pace.min.js',
    './resources/js/vendors/perfect-scrollbar.min.js',
    './resources/js/vendors/stacked-menu.min.js',
    './resources/js/vendors/theme.min.js',
], 'public/js/plugin.js');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
