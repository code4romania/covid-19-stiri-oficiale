const mix = require('laravel-mix');

mix.config.fileLoaderDirs.fonts = 'fonts';

mix.webpackConfig({
    devtool: mix.config.production ? 'none' : 'source-map',
});

if (mix.config.production) {
    mix.version();
}

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

mix.setPublicPath('public/assets')
    .setResourceRoot('./')

    .copyDirectory('resources/images', 'public/assets/images')

    .js('resources/js/app.js', 'public/assets')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss')('./tailwind.config.js'),
            require('postcss-nested')({
                bubble: ['screen'],
            }),
        ],
    })
    .postCss('resources/css/app.pcss', 'public/assets')
    .extract();
