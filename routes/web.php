<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\SiteServicesController;
use App\Http\Controllers\site\SiteProductsController;


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
});

Route::prefix('/')->group( function() {
    Route::controller(SiteServicesController::class)->group(function(){
        Route::get('/services/{slug}', 'index')->name('site.services.index');
        Route::get('/services/{slug}/{link?}', 'index')->name('site.services.index');
    });
    Route::controller(SiteProductsController::class)->group(function(){
        Route::get('/products/{slug}', 'index')->name('site.products.index');
        Route::get('/products/{slug}/{link?}', 'index')->name('site.products.index');
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
