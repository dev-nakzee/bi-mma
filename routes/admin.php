<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MenuController;

Route::middleware(['auth:admin', 'verified'])->prefix('admin')->group( function() {
    Route::get('/services/all', [MenuController::class, 'index'])->name('services.index');

    Route::get('/customize/pages', [PagesController::class, 'index'])->name('customize.pages.index');
    Route::get('/customize/pages/new', [PagesController::class, 'create'])->name('customize.pages.new');
    Route::get('/customize/pages/edit/{{$id}}', [PagesController::class, 'edit'])->name('customize.pages.edit');
    Route::get('/customize/pages/delete/{{$id}}', [PagesController::class, 'destroy'])->name('customize.pages.destroy');


    Route::get('/customize/menu', [MenuController::class, 'index'])->name('customize.menu.index');


});