<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'user.' ,'middleware' => 'user'], function () {
    Route::prefix('my-account')->name('my-account.')->group( function () {
        Route::get('/', [MyAccountController::class, 'index'])->name('index');
        Route::resource('order', OrderController::class)->only(['index', 'show']);
        Route::get('edit-account', [EditAccountController::class, 'index'])->name('edit-account.index');
        Route::put('edit-account', [EditAccountController::class, 'update'])->name('edit-account.update');
    });
});
