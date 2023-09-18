<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\MediaController;

Route::middleware(['auth:admin', 'verified'])->prefix('admin')->group( function() {
    Route::get('/notices/all', [NoticeController::class, 'index'])->name('notice.index');

    // services routes
    Route::controller(ServicesController::class)->group(function(){
        Route::get('/services', 'index')->name('services.index');
        Route::get('/services/new', 'create')->name('services.create');
        Route::post('/services/save', 'store')->name('services.save');
    });
    Route::get('/services/all', [ServicesController::class, 'index'])->name('services.index');

    Route::get('/products/all', [ProductsController::class, 'index'])->name('products.index');

    Route::get('/products/category/all', [CategoriesController::class, 'index'])->name('category.index');

    Route::get('/blogs/all', [BlogController::class, 'index'])->name('blogs.index');

    Route::get('/blogs/category/all', [BlogCategoryController::class, 'index'])->name('blogs.category.index');

    Route::controller(MediaController::class)->group(function(){
        Route::get('/media/all', 'index')->name('media.index');
        Route::get('/media/show/dataTable', 'show')->name('media.table');
        Route::post('/media/upload/store', 'store')->name('media.upload.store');
        Route::post('/media/delete', 'destroy')->name('media.remove');
        Route::get('/media/list', 'list')->name('media.list');
    });
    

    Route::controller(PagesController::class)->group(function(){
        Route::get('/customize/pages', 'index')->name('customize.pages.index');
        Route::get('/customize/pages/new', 'create')->name('customize.pages.new');
        Route::get('/customize/pages/edit/{{$id}}', 'edit')->name('customize.pages.edit');
        Route::get('/customize/pages/delete/{{$id}}', 'destroy')->name('customize.pages.destroy');
    });
    


    Route::get('/customize/menu', [MenuController::class, 'index'])->name('customize.menu.index');


});