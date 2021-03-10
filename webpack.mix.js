const mix = require('laravel-mix');

require('laravel-mix-valet');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.sourceMaps();
}

mix.valet('stiri.test')
    .setPublicPath('public/assets')
    .setResourceRoot('./')
    .copyDirectory('resources/images', 'public/assets/images')
    .js('resources/js/app.js', 'public/assets')
    .postCss('resources/css/app.pcss', 'public/assets', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested')({
            bubble: ['screen'],
        }),
    ])
    .extract();
