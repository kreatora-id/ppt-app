<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [Controllers\SlideController::class, 'index'])->name('home');
Route::get('slides', [Controllers\SlideController::class, 'index'])->name('slide.index');
Route::post('slides/checkout', [Controllers\SlideController::class, 'checkout'])->name('slide.checkout');
Route::post('slides/download', [Controllers\SlideController::class, 'download'])->name('slide.download');
Route::get('slides/{slug}', [Controllers\SlideController::class, 'show'])->name('slide.show');

Route::get('order', [Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('order/redirect_finish', [Controllers\OrderController::class, 'redirect_finish'])->name('order.redirect_finish');
Route::get('order/{order_number}', [Controllers\OrderController::class, 'show'])->name('order.show');

Route::post('resend_otp', [Controllers\OtpController::class, 'resendOtp'])->name('order.resend_otp');

Route::get('origin', function () {
    return view('enno_template_origin');
});

Route::get('storage/{params1}/{params2?}/{params3?}/{params4?}/{params5?}/{params6?}/{params7?}',
    [Controllers\ImageController::class, 'show'])->name('storage');

Route::get('check_mail', function (){
    return view('mails.email_otp_code', ['code' => '8765']);
});
