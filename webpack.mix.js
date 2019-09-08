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
mix.styles([
    'public/dashboard_files/css/rtl.css',
    'public/dashboard_files/css/bootstrap-rtl.min.css',
    'public/dashboard_files/css/AdminLTE-rtl.min.css',
],'public/css/dashboard-rtl.css').version();
mix.styles([
    'public/dashboard_files/css/AdminLTE.min.css',

],'public/css/dashboard-ltr.css').version();
mix.styles([
    'public/dashboard_files/css/bootstrap.min.css',
    'public/dashboard_files/css/ionicons.min.css',
    'public/dashboard_files/css/skin-blue.min.css',
    'public/dashboard_files/plugins/noty/noty.css',
    'public/dashboard_files/plugins/morris/morris.css',
    'public/dashboard_files/plugins/icheck/all.css',
],'public/css/dashboard.css').version();
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js([
    'public/dashboard_files/js/bootstrap.min.js',
    'public/dashboard_files/plugins/noty/noty.min.js',
    'public/dashboard_files/js/custom/order.js',
    'public/dashboard_files/js/custom/image_preview.js',
    'public/dashboard_files/plugins/morris/morris.min.js',
    'public/dashboard_files/js/printThis.js',
    'public/dashboard_files/js/jquery.number.min.js',
    'public/dashboard_files/plugins/ckeditor/ckeditor.js',
    'public/dashboard_files/js/adminlte.min.js',
    'public/dashboard_files/js/fastclick.js',
    'public/dashboard_files/plugins/icheck/icheck.min.js',
],'public/js/dashboard.js').version();
mix.js([
    'public/dashboard_files/js/jquery.min.js',

],'public/js/jquery.min.js').version();


