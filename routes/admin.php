<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Route::prefix('users')->name('users.')->group(function () {
    //     Route::get('/', [UserController::class, 'index'])->name('index');
    //     Route::get('/{user}', [UserController::class, 'index'])->name('edit');
    // });
    Route::resource('users', UserController::class)->except(['show']);
});
