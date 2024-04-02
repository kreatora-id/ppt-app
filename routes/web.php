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

Route::get('/', [Controllers\HomeController::class, 'index']);
Route::get('slides', [Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('slides/{slug}', [Controllers\HomeController::class, 'show'])->name('home.show');

Route::get('storage/{params1}/{params2?}/{params3?}/{params4?}/{params5?}/{params6?}/{params7?}',
    [Controllers\ImageController::class, 'show'])->name('storage');
