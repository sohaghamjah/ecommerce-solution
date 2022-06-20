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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    // ---------- Frontend assets start -------------//
    // Folder
    .copyDirectory('resources/frontend/assets/css/images', 'public/frontend/assets/css/images')
    .copyDirectory('resources/frontend/assets/fonts', 'public/frontend/assets/fonts')
    .copyDirectory('resources/frontend/assets/images', 'public/frontend/assets/images')
    // CSS
    .copy('resources/frontend/assets/css/bootstrap.min.css', 'public/frontend/assets/css/bootstrap.min.css')
    .copy('resources/frontend/assets/css/main.css', 'public/frontend/assets/css/main.css')
    .copy('resources/frontend/assets/css/animate.min.css', 'public/frontend/assets/css/animate.min.css')
    .copy('resources/frontend/assets/css/bootstrap-select.min.css', 'public/frontend/assets/css/bootstrap-select.min.css')
    .copy('resources/frontend/assets/css/blue.css', 'public/frontend/assets/css/blue.css')
    .copy('resources/frontend/assets/css/font-awesome.css', 'public/frontend/assets/css/font-awesome.css')
    .copy('resources/frontend/assets/css/lightbox.css', 'public/frontend/assets/css/lightbox.css')
    .copy('resources/frontend/assets/css/owl.carousel.css', 'public/frontend/assets/css/owl.carousel.css')
    .copy('resources/frontend/assets/css/owl.transitions.css', 'public/frontend/assets/css/owl.transitions.css')
    .copy('resources/frontend/assets/css/rateit.css', 'public/frontend/assets/css/rateit.css')
    // js
    .copy('resources/frontend/assets/js/bootstrap-hover-dropdown.min.js', 'public/frontend/assets/js/bootstrap-hover-dropdown.min.js')
    .copy('resources/frontend/assets/js/bootstrap-select.min.js', 'public/frontend/assets/js/bootstrap-select.min.js')
    .copy('resources/frontend/assets/js/bootstrap.js', 'public/frontend/assets/js/bootstrap.js')
    .copy('resources/frontend/assets/js/bootstrap.min.js', 'public/frontend/assets/js/bootstrap.min.js')
    .copy('resources/frontend/assets/js/echo.min.js', 'public/frontend/assets/js/echo.min.js')
    .copy('resources/frontend/assets/js/jquery.easing-1.3.min.js', 'public/frontend/assets/js/jquery.easing-1.3.min.js')
    .copy('resources/frontend/assets/js/jquery-1.11.1.min.js', 'public/frontend/assets/js/jquery-1.11.1.min.js')
    .copy('resources/frontend/assets/js/jquery.rateit.min.js', 'public/frontend/assets/js/jquery.rateit.min.js')
    .copy('resources/frontend/assets/js/lightbox.min.js', 'public/frontend/assets/js/lightbox.min.js')
    .copy('resources/frontend/assets/js/owl.carousel.min.js', 'public/frontend/assets/js/owl.carousel.min.js')
    .copy('resources/frontend/assets/js/scripts.js', 'public/frontend/assets/js/scripts.js')
    .copy('resources/frontend/assets/js/wow.min.js', 'public/frontend/assets/js/wow.min.js')
    // ---------- Frontend assets end -------------//
    ;
 
if (mix.inProduction()) {
    mix.version();
}
