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

mix.js('resources/js/app.js', 'public/js');
mix.styles(['resources/js/app.js'], 'public/css/app.css').version();

mix.styles([
    'public/css/social-icons.css',
    'public/css/owl.carousel.css',
    'public/css/owl.theme.css',
    'public/css/prism.css',
    'public/css/main.css',
    'public/css/custom.css',
], 'public/css/all.css').version();

mix.js(
    'public/js/scripts.js', 'public/js/scripts.min.js')
    .js('resources/assets/js/profile.js', 'public/assets/js/profile.js')
    .js('resources/assets/js/custom/custom.js', 'public/assets/js/custom/custom.js')
    .js('resources/assets/js/custom/custom-datatable.js', 'public/assets/js/custom/custom-datatable.js')
    .version();

mix.sass('resources/assets/sass/custom.scss', 'public/assets/css/custom.css');

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');

mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'public/assets/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy('node_modules/sweetalert/dist/sweetalert.css',
    'public/assets/css/sweetalert.css');
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');
mix.copy('node_modules/summernote/dist/summernote.min.css',
    'public/assets/css/summernote.min.css');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/css',
    'public/assets/css/@fortawesome/fontawesome-free/css');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/assets/css/@fortawesome/fontawesome-free/webfonts');
mix.copyDirectory('node_modules/summernote/dist/font','public/assets/css/font');

mix.babel('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'public/assets/js/jquery.nicescroll.js');
mix.babel('node_modules/jquery/dist/jquery.min.js',
    'public/assets/js/jquery.min.js');
mix.babel('node_modules/popper.js/dist/umd/popper.min.js',
    'public/assets/js/popper.min.js');
mix.babel('node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/js/bootstrap.min.js');
mix.babel('node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js');
mix.babel('node_modules/select2/dist/js/select2.min.js',
    'public/assets/js/select2.min.js');
mix.babel('node_modules/sweetalert/dist/sweetalert.min.js',
    'public/assets/js/sweetalert.min.js');
mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');
mix.babel('node_modules/summernote/dist/summernote.min.js',
    'public/assets/js/summernote.min.js');


 mix.js('resources/assets/js/users/users.js', 'public/assets/js/users/users.js')
 mix.js('resources/assets/js/users/create-edit.js', 'public/assets/js/users/create-edit.js')
 mix.js('resources/assets/js/plant_types/plant-types.js', 'public/assets/js/plant_types/plant-types.js')
mix.js('resources/assets/js/plant_uses/plant-uses.js', 'public/assets/js/plant_uses/plant-uses.js')
mix.js('resources/assets/js/plants/plants.js', 'public/assets/js/plants/plants.js') 
mix.js('resources/assets/js/plants/create-edit.js', 'public/assets/js/plants/create-edit.js')
mix.js('resources/assets/js/seed_types/seed-types.js', 'public/assets/js/seed_types/seed-types.js')
mix.js('resources/assets/js/seeds/seeds.js', 'public/assets/js/seeds/seeds.js')
mix.js('resources/assets/js/seeds/create-edit.js', 'public/assets/js/seeds/create-edit.js')
mix.js('resources/assets/js/garden_types/garden-types.js','public/assets/js/garden_types/garden-types.js')
mix.js('resources/assets/js/gardens/gardens.js', 'public/assets/js/gardens/gardens.js')
mix.js('resources/assets/js/gardens/create-edit.js', 'public/assets/js/gardens/create-edit.js')
mix.js('resources/assets/js/blog/blog.js', 'public/assets/js/blog/blog.js')
mix.js('resources/assets/js/blog/create-edit.js', 'public/assets/js/blog/create-edit.js')
mix.js('resources/assets/js/testimonials/testimonials.js','public/assets/js/testimonials/testimonials.js')
mix.js('resources/assets/js/testimonials/create-edit.js','public/assets/js/testimonials/create-edit.js')
mix.js('resources/assets/js/schemes/schemes.js','public/assets/js/schemes/schemes.js')
mix.js('resources/assets/js/schemes/create-edit.js','public/assets/js/schemes/create-edit.js')
mix.js('resources/assets/js/inquires/inquires.js','public/assets/js/inquires/inquires.js')
.version();
