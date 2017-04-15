const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');
var type = 'local';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

if (type == 'local') {
    elixir((mix) => {
        mix.scripts([
            '../../../bower_modules/jquery/dist/jquery.js',
            '../../../bower_modules/tether/dist/js/tether.min.js',
            '../../../bower_modules/bootstrap/dist/js/bootstrap.js',
            '../../../bower_modules/socket.io-client/dist/socket.io.js',
            '../../../bower_modules/moment/min/moment.min.js',
            '../../../bower_modules/toastr/toastr.min.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.date.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.time.js',
            '../../../bower_modules/Chart.js/dist/Chart.js',
            '../../../bower_modules/sweetalert/dist/sweetalert.min.js',
            '../../../bower_modules/ekko-lightbox/dist/ekko-lightbox.min.js',
            '../../../bower_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
            '../../../bower_modules/awesome-rating/dist/awesomeRating.js',
            '../../../bower_modules/leaflet/dist/leaflet.js',
            '../../../bower_modules/leaflet-search/dist/leaflet-search.min.js',
            '../../../bower_modules/leaflet-routing-machine/dist/leaflet-routing-machine.min.js',
            '../../../bower_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js',
            '../../../bower_modules/eventEmitter/EventEmitter.js',
        ], 'public/assets/js/vendor.js');

        mix.copy('bower_modules/loadcss/src/loadCSS.js', 'public/assets/js/lib');
        mix.copy('bower_modules/loadcss/src/onloadCSS.js', 'public/assets/js/lib');

        mix.styles([
            '../../../public/assets/css/animated-loading.css',

            '../../../bower_modules/tether/dist/css/tether.min.css',
            '../../../bower_modules/tether/dist/css/tether-theme-basic.min.css',
            '../../../bower_modules/bootstrap/dist/css/bootstrap.min.css',
            '../../../bower_modules/font-awesome/css/font-awesome.css',
            '../../../bower_modules/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            '../../../bower_modules/toastr/toastr.css',
            '../../../bower_modules/animate.css/animate.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.date.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.time.css',
            '../../../bower_modules/sweetalert/dist/sweetalert.css',
            '../../../bower_modules/ekko-lightbox/dist/ekko-lightbox.min.css',
            '../../../bower_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
            '../../../bower_modules/awesome-rating/dist/awesomeRating.css',
            '../../../bower_modules/leaflet/dist/leaflet.css',
            '../../../bower_modules/leaflet-search/dist/leaflet-search.min.css',
            '../../../bower_modules/leaflet-routing-machine/dist/leaflet-routing-machine.css'
        ], 'public/assets/css/vendor.css');

        mix.copy('../../../bower_modules/font-awesome/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/bootstrap/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/ionicons/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/leaflet/dist/images', 'public/assets/css/images');
    });
} else {
    elixir((mix) => {
        mix.scripts([
            '../../../bower_modules/jquery/dist/jquery.js',
            '../../../bower_modules/tether/dist/js/tether.min.js',
            '../../../bower_modules/bootstrap/dist/js/bootstrap.js',
            '../../../bower_modules/socket.io-client/dist/socket.io.js',
            '../../../bower_modules/moment/min/moment.min.js',
            '../../../bower_modules/toastr/toastr.min.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.date.js',
            '../../../bower_modules/pickadate/lib/compressed/picker.time.js',
            '../../../bower_modules/Chart.js/dist/Chart.js',
            '../../../bower_modules/sweetalert/dist/sweetalert.min.js',
            '../../../bower_modules/ekko-lightbox/dist/ekko-lightbox.min.js',
            '../../../bower_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
            '../../../bower_modules/awesome-rating/dist/awesomeRating.js',
            '../../../bower_modules/leaflet/dist/leaflet.js',
            '../../../bower_modules/leaflet-search/dist/leaflet-search.min.js',
            '../../../bower_modules/leaflet-routing-machine/dist/leaflet-routing-machine.min.js',
            '../../../bower_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js',
            '../../../bower_modules/eventEmitter/EventEmitter.js',

            '../../../public/assets/js/lib/helper.js',
            '../../../public/assets/js/lib/upload.js',
            '../../../public/assets/js/lib/socket.js',
            '../../../public/assets/js/main.js',
            '../../../public/assets/js/app.js',
            '../../../public/assets/js/admin/main.js'
        ], 'public/assets/js/vendor.js');

        mix.copy('bower_modules/loadcss/src/loadCSS.js', 'public/assets/js/lib');
        mix.copy('bower_modules/loadcss/src/onloadCSS.js', 'public/assets/js/lib');

        mix.styles([
            '../../../public/assets/css/animated-loading.css',

            '../../../bower_modules/tether/dist/css/tether.min.css',
            '../../../bower_modules/tether/dist/css/tether-theme-basic.min.css',
            '../../../bower_modules/bootstrap/dist/css/bootstrap.min.css',
            '../../../bower_modules/font-awesome/css/font-awesome.css',
            '../../../bower_modules/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            '../../../bower_modules/toastr/toastr.css',
            '../../../bower_modules/animate.css/animate.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.date.css',
            '../../../bower_modules/pickadate/lib/compressed/themes/default.time.css',
            '../../../bower_modules/sweetalert/dist/sweetalert.css',
            '../../../bower_modules/ekko-lightbox/dist/ekko-lightbox.min.css',
            '../../../bower_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
            '../../../bower_modules/awesome-rating/dist/awesomeRating.css',
            '../../../bower_modules/leaflet/dist/leaflet.css',
            '../../../bower_modules/leaflet-search/dist/leaflet-search.min.css',
            '../../../bower_modules/leaflet-routing-machine/dist/leaflet-routing-machine.css',

            '../../../public/assets/css/main.css'
        ], 'public/assets/css/vendor.css');

        mix.copy('../../../bower_modules/font-awesome/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/bootstrap/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/ionicons/fonts', 'public/assets/fonts');
        mix.copy('../../../bower_modules/leaflet/dist/images', 'public/assets/css/images');
    });
}