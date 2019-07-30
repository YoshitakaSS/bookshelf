const mix = require('laravel-mix');     // LaravelMix
const glob = require('glob')            // ワイルドカード



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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// mix.sass(
//     'resources/sass/user/review.scss', 'public/css');

glob.sync('resources/sass/*/*.scss').map(function (file) {
    mix.sass(file, 'public/assets/css/*')
});

glob.sync('resources/js/*.js').map(function (file) {
    mix.js(file, 'public/assets/js')
});

// mix.browserSync({
//         files: [
//             './public/css/*.css',
//             './public/css/*/*.css',
//             './public/js/*.js',
//             './public/js/*/*.js',
//             './app/**/*',
//             './config/**/*',
//             './resources/views/**/*.blade.php',
//             './routes/**/*'
//         ],
//         server: './public/',
//         proxy: false
//     });


