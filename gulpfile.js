var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'vendor/almasaeed2010/adminlte/dist/css/AdminLTE.css',
            'vendor/almasaeed2010/adminlte/dist/css/skins/skin-blue.css'
        ], 'public/css/vendor.css', './')
        .scripts([
        "destroylink.js"
        ])
        .scripts([
            "vendor/almasaeed2010/adminlte/dist/js/app.js",
            "node_modules/underscore/underscore.js",
        ],  "public/js/vendor.js",'./')
        .copy("resources/assets/js/serverstatus.js",'public/js/serverstatus.js')
        .copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts')
        .copy('node_modules/bootstrap-sass/assets/fonts', 'public/build/fonts')
        .copy('vendor/almasaeed2010/adminlte/plugins', 'public/js/plugins')
        .version(['public/js/all.js','public/js/vendor.js','public/js/serverstatus.js','public/css/app.css', 'public/css/vendor.css','public/js/plugins/**/*', 'public/fonts/bootstrap/**/*']);
});
