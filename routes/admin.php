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
use App\Http\Controllers\DocumentController;

Route::middleware(['auth:admin', 'verified'])->prefix('admin')->group( function() {
    Route::get('/notices/all', [NoticeController::class, 'index'])->name('notice.index');

    // services routes
    Route::controller(ServicesController::class)->group(function(){
        Route::get('/services', 'index')->name('services.index');
        Route::get('/services/new', 'create')->name('services.create');
        Route::post('/services/save', 'store')->name('services.save');
        Route::get('/services/show/dataTable', 'show')->name('services.table');
        Route::get('/services/edit/{id}', 'edit')->name('services.edit');
        Route::post('/services/update','update')->name('services.update');
        Route::post('/services/delete','destroy')->name('services.remove');
    });
    // products routes
    Route::controller(ProductsController::class)->group(function(){
        Route::get('/products/all', 'index')->name('products.index');
        Route::get('/products/new', 'create')->name('products.create');
        Route::post('/products/save', 'store')->name('products.save');
        Route::get('/products/show/dataTable', 'show')->name('products.table');
        Route::get('/products/edit/{id}', 'edit')->name('products.edit');
        Route::post('/products/update','update')->name('products.update');
        Route::post('/products/delete','destroy')->name('products.remove');

    });

   

    Route::controller(CategoriesController::class)->group(function(){
        Route::get('/categories/all', 'index')->name('category.index');
        Route::get('/categories/show/dataTable', 'show')->name('category.table');
        Route::get('/categories/new', 'create')->name('category.create');
        Route::post('/categories/save', 'store')->name('category.save');
        Route::get('/categories/edit/{id?}', 'edit')->name('category.edit');
        Route::post('/categories/update', 'update')->name('category.update');
        Route::get('/categories/delete/{id?}', 'destroy')->name('category.remove');
    });

    Route::get('/blogs/all', [BlogController::class, 'index'])->name('blogs.index');

    Route::controller(BlogController::class)->group(function(){
        Route::get('/blogs/all', 'index')->name('blogs.index');
        Route::get('/blogs/show/dataTable', 'show')->name('blogs.table');
        Route::get('/blogs/new', 'create')->name('blogs.create');
        Route::post('/blogs/save', 'store')->name('blogs.save');
        Route::get('/blogs/edit/{id?}', 'edit')->name('blogs.edit');
        Route::post('/blogs/update', 'update')->name('blogs.update');
        Route::get('/blogs/delete/{id?}', 'destroy')->name('blogs.remove');
    });

    Route::controller(BlogCategoryController::class)->group(function(){
        Route::get('/blog/categories/all', 'index')->name('blogs.category.index');
        Route::get('/blog/categories/list', 'list')->name('blogs.category.list');
        Route::get('/blog/categories/show/dataTable', 'show')->name('blogs.category.table');
        Route::get('/blog/categories/new', 'create')->name('blogs.category.create');
        Route::post('/blog/categories/save', 'store')->name('blogs.category.save');
        Route::get('/blog/categories/edit/{id?}', 'edit')->name('blogs.category.edit');
        Route::post('/blog/categories/update', 'update')->name('blogs.category.update');
        Route::get('/blog/categories/delete/{id?}', 'destroy')->name('blogs.category.remove');
    });

    Route::controller(MediaController::class)->group(function(){
        Route::get('/media/all', 'index')->name('media.index');
        Route::get('/media/show/dataTable', 'show')->name('media.table');
        Route::post('/media/upload/store', 'store')->name('media.upload.store');
        Route::post('/media/delete', 'destroy')->name('media.remove');
        Route::get('/media/list', 'list')->name('media.list');
    });
    
    Route::controller(DocumentController::class)->group(function(){
        Route::get('/documents/all', 'index')->name('docs.index');
        Route::get('/documents/show/dataTable', 'show')->name('docs.table');
        Route::post('/documents/upload/store', 'store')->name('docs.upload.store');
        Route::post('/documents/delete', 'destroy')->name('docs.remove');
        Route::get('/documents/list', 'list')->name('docs.list');
    });

    Route::controller(PagesController::class)->group(function(){
        Route::get('/customize/pages', 'index')->name('customize.pages.index');
        Route::get('/customize/pages/new', 'create')->name('customize.pages.new');
        Route::get('/customize/pages/edit/{{$id}}', 'edit')->name('customize.pages.edit');
        Route::get('/customize/pages/delete/{{$id}}', 'destroy')->name('customize.pages.destroy');
    });
    
    Route::controller(MenuController::class)->group(function(){
        Route::get('/customize/menus', 'index')->name('customize.menu.index');
    });

});