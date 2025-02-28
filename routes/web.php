<?php
namespace App\Http\Controllers\Guest;
use Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product');
Route::get('/payment/notify/{payment:code}', [PaymentController::class, 'notify'])->name('payment.notify');
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('auth', [AuthController::class, 'index'])->name('auth')->middleware('guest');
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');       
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('index');
    })->name('logout');
    Route::match(['get', 'post'],'reset-password/{token?}', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('change-password', [AuthController::class, 'changePassword'])->name('change-password');
});