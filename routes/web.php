<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\ReviewController;


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


Auth::routes();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function() {

    Route::resource('books', 'BookController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('nices', 'NiceController');
    
    
    Route::get('/', [BookController::class, 'index']);
    // Route::get('ajaxnice', 'BookController@ajaxnice');
    Route::post('/ajaxnice', [BookController::class, 'ajaxnice']);
    Route::get('/past', [BookController::class, 'past'])->name('past');
    // Route::get('/edit', [BookController::class, 'edit'])->name('edit');
    Route::get('/search', [BookController::class, 'search'])->name('search');
    Route::get('/nicehistory', [ReviewController::class, 'nicehistory'])->name('nicehistory');
    // Route::get('/show/{book}',[ArticleController::class, 'show'])->name('show');
    // Route::get('/create/{book}',[ArticleController::class, 'create'])->name('create');
    // Route::get('/store/{book}',[ArticleController::class, 'store'])->name('store');
    // Route::get('/past/{book}',[ArticleController::class, 'past'])->name('past');
// Route::get('/edit/{book}',[ArticleController::class, 'edit'])->name('edit');
// Route::resource('articles', 'ArticleController');

    // Route::get('past', function () {
    //     return view('book/past');
    // });
    // Route::get('/search', function () {
    //     return view('search');
    // });

    
});


