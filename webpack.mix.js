const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableSuccessNotifications();

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/hotspot.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).postCss('resources/css/hotspot.css', 'public/css', [
        //
    ])
    .alias({
        '@': 'resources/js',
    });

if (mix.inProduction()) {
    mix.version();
}
