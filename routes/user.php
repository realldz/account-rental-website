<?php
namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'user.' ,'middleware' => 'user'], function () {
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('payment/pay', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::post('add', [CartController::class, 'addToCart'])->name('add');
        Route::delete('remove', [CartController::class, 'remove'])->name('remove');
        Route::put('update', [CartController::class, 'update'])->name('update');
        Route::get('count', [CartController::class, 'count'])->name('count');
        Route::get('price', [CartController::class, 'getPrice'])->name('getPrice');
        Route::get('totalPrice', [CartController::class, 'getTotalPrice'])->name('getTotalPrice');
    });
    Route::post('product/{product:slug}/comment', [CommentController::class, 'create'])->name('product.comment.create');
    Route::post('product/{product:slug}/comment/{comment}', [CommentController::class, 'reply'])->name('product.comment.reply');
    Route::prefix('my-account')->name('my-account.')->group( function () {
        Route::get('/', [MyAccountController::class, 'index'])->name('index');
        Route::post('order/{order}/renew', [OrderController::class, 'renew'])->name('order.renew');
        Route::resource('order', OrderController::class)->only(['index', 'show']);
        Route::get('edit-account', [EditAccountController::class, 'index'])->name('edit-account.index');
        Route::put('edit-account', [EditAccountController::class, 'update'])->name('edit-account.update');
    });
});
