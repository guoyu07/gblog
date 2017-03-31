const { mix } = require('laravel-mix');

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

// mix.config.sourcemaps = false;

mix.js('resources/assets/js/app.js', 'public/js')
    .combine([
    	'resources/assets/vendor/css/bootstrap.min.css',
    	'resources/assets/vendor/css/AdminLTE.min.css',
        'resources/assets/vendor/css/_all-skins.min.css',
    	'node_modules/font-awesome/css/font-awesome.min.css',

    ], 'public/css/vendor.css')

    .combine([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'resources/assets/vendor/js/app.min.js',

    ], 'public/js/vendor.js')

    .js('resources/assets/js/web/app.js', 'public/web/js');
