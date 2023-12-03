<?php

use App\Http\Controllers\GardenController;
use App\Http\Controllers\GardenTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantTypeController;
use App\Http\Controllers\PlantUseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\SeedTypeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController as WebHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('front.home.home');
//});
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showHome'])->name('home');
// Public Route
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('/users/login', [App\Http\Controllers\Auth\LoginController::class, 'showUserLoginForm'])->name('users.login');
Route::get('/users/register', [App\Http\Controllers\Auth\LoginController::class, 'showUserRegisterForm'])->name('users.register');
Route::post('/send-contact', [WebHomeController::class, 'sendContact'])->name('send.contact');
Route::get('/contact-us', [WebHomeController::class, 'contactUs'])->name('contact');
Route::get('/about-us', [WebHomeController::class, 'aboutUs'])->name('about');
Route::get('/blog', [WebHomeController::class, 'blog'])->name('blog');
Route::get('/blog/{blog}', [WebHomeController::class, 'blogShow'])->name('blog.show');
Route::get('/plantType', [PlantController::class, 'plantTypeShow'])->name('plant.type.show');
Route::get('/plantUse', [PlantController::class, 'plantUseShow'])->name('plant.use.show');
Route::get('/plantUse-details/{plantUse}', [PlantController::class, 'plantUseDetails'])->name('plant.use.details');
Route::get('/plantType-details/{plantType}', [PlantController::class, 'plantTypeDetails'])->name('plant.type.details');
Route::get('/plantUse-shop-details/{plantUse}', [PlantController::class, 'plantUseShopDetails'])->name('plant.use.shop.details');
Route::get('/seedType-details/{seedType}', [SeedController::class, 'seedTypeDetails'])->name('seed.type.details');
Route::get('/seedType-shop-details/{seedType}', [SeedController::class, 'seedShopDetails'])->name('seed.shop.details');
Route::get('/gardenType-details/{gardenType}', [GardenController::class, 'gardenTypeDetails'])->name('garden.type.details');
Route::get('/gardenType-shop-details/{gardenType}', [GardenController::class, 'gardenShopDetails'])->name('garden.shop.details');
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'admin', 'verified.user'], 'prefix' => 'admin'], function () {
    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');
    Route::get('profile', [UserController::class, 'editProfile']);
    Route::post('change-password', [UserController::class, 'changePassword']);
    Route::post('profile-update', [UserController::class, 'profileUpdate']);
    // Users Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/change-is-active', [UserController::class, 'status'])->name('users.status');
    
    // Plants Routes
    Route::get('/plant-types', [PlantTypeController::class, 'index'])->name('plants.types.index');
    Route::post('/plant-types', [PlantTypeController::class, 'store'])->name('plants.types.store');
    Route::get('/plant-types/{plantType}/edit', [PlantTypeController::class, 'edit'])->name('plants.edit');
    Route::post('/plant-types/{plantType}', [PlantTypeController::class, 'update'])->name('plants.types.update');
    Route::delete('/plant-types/{plantType}', [PlantTypeController::class, 'destroy'])->name('plants.types.destroy');
    Route::post('/plant-types/{plantType}/status', [PlantTypeController::class, 'status'])->name('plants.types.status');
    Route::get('/plant-types/{plantType}', [PlantTypeController::class, 'show'])->name('plants.types.show');

    // Plants Uses Routes
    Route::get('/plant-uses', [PlantUseController::class, 'index'])->name('plants.uses.index');
    Route::post('/plant-uses', [PlantUseController::class, 'store'])->name('plants.uses.store');
    Route::get('/plant-uses/{plantUse}/edit', [PlantUseController::class, 'edit'])->name('plants.edit');
    Route::post('/plant-uses/{plantUse}', [PlantUseController::class, 'update'])->name('plants.uses.update');
    Route::delete('/plant-uses/{plantUse}', [PlantUseController::class, 'destroy'])->name('plants.uses.destroy');
    Route::post('/plant-uses/{plantUse}/status', [PlantUseController::class, 'status'])->name('plants.uses.status');
    Route::get('/plant-uses/{plantUse}', [PlantUseController::class, 'show'])->name('plants.uses.show');
    
    // plants Routes
    Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
    Route::get('plants/create', [PlantController::class, 'create'])->name('plants.create');
    Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/plants/{plant}/edit', [PlantController::class, 'edit'])->name('plants.edit');
    Route::patch('/plants/{plant}', [PlantController::class, 'update'])->name('plants.update');
    Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('plants.destroy');
    Route::post('/plants/{plant}/status', [PlantController::class, 'status'])->name('plants.status');

    // Seeds Types Routes
    Route::get('/seed-types', [SeedTypeController::class, 'index'])->name('seeds.types.index');
    Route::post('/seed-types', [SeedTypeController::class, 'store'])->name('seeds.types.store');
    Route::get('/seed-types/{seedType}/edit', [SeedTypeController::class, 'edit'])->name('seeds.edit');
    Route::post('/seed-types/{seedType}', [SeedTypeController::class, 'update'])->name('seeds.types.update');
    Route::delete('/seed-types/{seedType}', [SeedTypeController::class, 'destroy'])->name('seeds.types.destroy');
    Route::post('/seed-types/{seedType}/status', [SeedTypeController::class, 'status'])->name('seeds.types.status');

    // Seeds Routes
    Route::get('/seeds', [SeedController::class, 'index'])->name('seeds.index');
    Route::get('seeds/create', [SeedController::class, 'create'])->name('seeds.create');
    Route::post('/seeds', [SeedController::class, 'store'])->name('seeds.store');
    Route::get('/seeds/{seed}/edit', [SeedController::class, 'edit'])->name('seeds.edit');
    Route::patch('/seeds/{seed}', [SeedController::class, 'update'])->name('seeds.update');
    Route::delete('/seeds/{seed}', [SeedController::class, 'destroy'])->name('seeds.destroy');
    Route::post('/seeds/{seed}/status', [SeedController::class, 'status'])->name('seeds.status');

    // Garden Types Routes
    Route::get('/garden-types', [GardenTypeController::class, 'index'])->name('gardens.types.index');
    Route::post('/garden-types', [GardenTypeController::class, 'store'])->name('gardens.types.store');
    Route::get('/garden-types/{gardenType}/edit', [GardenTypeController::class, 'edit'])->name('gardens.edit');
    Route::post('/garden-types/{gardenType}', [GardenTypeController::class, 'update'])->name('gardens.types.update');
    Route::delete('/garden-types/{gardenType}', [GardenTypeController::class, 'destroy'])->name('gardens.types.destroy');
    Route::post('/garden-types/{gardenType}/status', [GardenTypeController::class, 'status'])->name('gardens.types.status');

    // Garden Routes
    Route::get('/gardens', [GardenController::class, 'index'])->name('gardens.index');
    Route::get('gardens/create', [GardenController::class, 'create'])->name('gardens.create');
    Route::post('/gardens', [GardenController::class, 'store'])->name('gardens.store');
    Route::get('/gardens/{garden}/edit', [GardenController::class, 'edit'])->name('gardens.edit');
    Route::patch('/gardens/{garden}', [GardenController::class, 'update'])->name('gardens.update');
    Route::delete('/gardens/{garden}', [GardenController::class, 'destroy'])->name('gardens.destroy');
    Route::post('/gardens/{garden}/status', [GardenController::class, 'status'])->name('gardens.status');

    // Blogs Routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::patch('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::post('/blogs/{blog}/status', [BlogController::class, 'status'])->name('blogs.status');

    // Testimonials Routes
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::patch('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::post('/testimonials/{testimonial}/status', [TestimonialController::class, 'status'])->name('testimonial.status');

    // Schemes Routes
    Route::get('/schemes', [SchemeController::class, 'index'])->name('scheme.index');
    Route::get('schemes/create', [SchemeController::class, 'create'])->name('scheme.create');
    Route::post('/schemes', [SchemeController::class, 'store'])->name('scheme.store');
    Route::get('/schemes/{scheme}/edit', [SchemeController::class, 'edit'])->name('scheme.edit');
    Route::patch('/schemes/{scheme}', [SchemeController::class, 'update'])->name('scheme.update');
    Route::delete('/schemes/{scheme}', [SchemeController::class, 'destroy'])->name('scheme.destroy');
    Route::post('/schemes/{scheme}/status', [SchemeController::class, 'status'])->name('scheme.status');
    
    //notification Routes
    Route::post('/notification/{notification}/read',[NotificationController::class, 'readNotification'])->name('read-notification');

    // inquires listing route
    Route::get('inquires', [InquiryController::class, 'index'])->name('inquires.index');
    Route::delete('inquires/{inquiry}', [InquiryController::class, 'destroy'])->name('inquires.destroy');
    Route::get('inquires/{inquiry}', [InquiryController::class, 'show'])->name('inquires.show');

});
Route::group(['middleware' => ['auth','user', 'verified.user'], 'prefix' => 'users'], function () {
    Route::get('/dashboard', [HomeController::class, 'userIndex'])->name('users.home');
    Route::get('/user-profile', [App\Http\Controllers\Client\UserController::class, 'editProfile']);
    Route::post('/user-change-password', [App\Http\Controllers\Client\UserController::class, 'changePassword']);
    Route::post('/user-profile-update', [App\Http\Controllers\Client\UserController::class, 'profileUpdate']);

    // Blogs Routes
    Route::get('/blogs', [App\Http\Controllers\Client\BlogController::class, 'index'])->name('user.blogs.index');
    Route::get('blogs/create', [App\Http\Controllers\Client\BlogController::class, 'create'])->name('user.blogs.create');
    Route::post('/blogs', [App\Http\Controllers\Client\BlogController::class, 'store'])->name('user.blogs.store');
    Route::get('/blogs/{blog}/edit', [App\Http\Controllers\Client\BlogController::class, 'edit'])->name('user.blogs.edit');
    Route::patch('/blogs/{blog}', [App\Http\Controllers\Client\BlogController::class, 'update'])->name('user.blogs.update');
    Route::delete('/blogs/{blog}', [App\Http\Controllers\Client\BlogController::class, 'destroy'])->name('user.blogs.destroy');
    Route::post('/blogs/{blog}/status', [App\Http\Controllers\Client\BlogController::class, 'status'])->name('user.blogs.status');
});

Route::group(['middleware' => ['auth', 'verified.user']], function () {
    Route::post('update-language', [UserController::class, 'updateLanguage']);
});

//Route::resource('posts', App\Http\Controllers\PostController::class);
