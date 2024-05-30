const mix = require('laravel-mix');
const src = 'resources';

/**
 * Frontend Asset Compilation
 * @type {string}
 */
mix.js(src + '/js/app.js', 'public/js')
    .css(src + '/css/app.css', 'public/css')
    .version();
