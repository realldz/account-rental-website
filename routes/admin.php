<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('users', [UserController::class, 'index'])->name('users');
});
