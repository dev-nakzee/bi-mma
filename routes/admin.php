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

    Route::get('/services/all', [ServicesController::class, 'index'])->name('services.index');

    Route::get('/products/all', [ProductsController::class, 'index'])->name('products.index');

    Route::get('/products/category/all', [CategoriesController::class, 'index'])->name('category.index');

    Route::get('/blogs/all', [BlogController::class, 'index'])->name('blogs.index');

    Route::get('/blogs/category/all', [BlogCategoryController::class, 'index'])->name('blogs.category.index');

    Route::get('/media/images/all', [MediaController::class, 'imgIndex'])->name('media.images.index');

    Route::get('/customize/pages', [PagesController::class, 'index'])->name('customize.pages.index');
    Route::get('/customize/pages/new', [PagesController::class, 'create'])->name('customize.pages.new');
    Route::get('/customize/pages/edit/{{$id}}', [PagesController::class, 'edit'])->name('customize.pages.edit');
    Route::get('/customize/pages/delete/{{$id}}', [PagesController::class, 'destroy'])->name('customize.pages.destroy');


    Route::get('/customize/menu', [MenuController::class, 'index'])->name('customize.menu.index');


});