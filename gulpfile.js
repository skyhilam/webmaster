const elixir = require('laravel-elixir');

require('laravel-elixir-vue');



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

elixir(mix => {
	// mix.copy('node_modules/foundation-sites/scss/settings', 'resources/assets/sass/web');
    mix.sass('admin/app.scss', 'public/css/admin/app.css');
    mix.sass('web/app.scss', 'public/css/web/app.css');


});
