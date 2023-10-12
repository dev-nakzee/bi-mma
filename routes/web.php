<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\SiteServicesController;
use App\Http\Controllers\site\SiteProductsController;
use App\Http\Controllers\site\SiteBlogsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'homepage')->name('site.home');
    Route::get('/contact', 'contact')->name('site.contact');
    Route::get('/clients', 'clients')->name('site.clients');
    Route::post('/search', 'find')->name('site.search');
});

Route::prefix('/')->group( function() {
    Route::controller(SiteServicesController::class)->group(function(){
        Route::get('/services/{slug}', 'index')->name('site.services.index');
        Route::get('/services/{slug}/{link?}', 'index')->name('site.services.index');
    });
    Route::controller(SiteProductsController::class)->group(function(){
        Route::get('/products/{slug}', 'index')->name('site.products.index');
        Route::get('/products/{slug}', 'index')->name('site.products.index');
    });
    Route::controller(SiteBlogsController::class)->group(function(){
        Route::get('blogs', 'index')->name('site.blogs');
        Route::get('/blogs/{category}', 'category')->name('site.blogs.sort');
        Route::get('/blogs/{category}/{slug}', 'single')->name('site.blogs.single');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
require __DIR__.'/admin.php';
