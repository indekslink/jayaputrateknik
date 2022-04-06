<?php

use App\Http\Controllers\{
    AdminController,
    AuthController,
    GalleryController,
    ItemController,
    MainController,
    MoreServicesController,
    ProductController,
    SosmedController,
    WWEController
};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/updateapp', function () {
    system('composer dump-autoload');
    exec("composer dump-autoload");
    echo 'dump-autoload complete';
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->name('post_login');


Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact-us', [MainController::class, 'contact_us'])->name('contact');
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'main_index'])->name('main.products');
    Route::get('/{product:slug}', [ProductController::class, 'main_show'])->name('main.products.show');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::resources([
        'products' => ProductController::class,
        'items' => ItemController::class,
        'sosmed' => SosmedController::class,
        'wwe' => WWEController::class,
        'ms' => MoreServicesController::class,
        'gallery' => GalleryController::class
    ]);
    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
    // Route::get('/sosmed', [AdminController::class, 'contact'])->name('admin.sosmed');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
