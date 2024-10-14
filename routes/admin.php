<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('user', UserController::class)->except(['show']);
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show'] );
});
