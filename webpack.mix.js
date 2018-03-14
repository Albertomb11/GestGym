let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/formularioRegisterAsincrona.js', 'public/js')
    .js('resources/assets/js/paginacionAsincrona.js', 'public/js')
    .js('resources/assets/js/formularioEditarPerfilAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearGimnasioAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearMonitorAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearActividadAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearMaquinaAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearProductoAsincrono.js', 'public/js')
    .js('resources/assets/js/formularioCrearSalaAsincrono.js', 'public/js')
    .styles(['resources/assets/css/spinner.css'], 'public/css/spinner.css')
    .styles(['resources/assets/css/login.css'], 'public/css/login.css')
    .styles(['resources/assets/css/register.css'], 'public/css/register.css')
    .styles(['resources/assets/css/cartasGimnasios.css'], 'public/css/cartasGimnasios.css');
